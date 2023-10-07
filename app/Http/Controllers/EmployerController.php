<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class EmployerController extends Controller
{
    public function rabsignup (Request $request) {
        $employerData = $request->all();
        $validator = Validator::make($employerData, [
           'email' => 'required|unique:employers|email:rfc, dns, filter',
           'name' => 'required',
           'password' => 'required',
           'contacts' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect(route('rab-signup'))
                ->withErrors($validator)
                ->withInput();
        }

        $employer = new Employer();
        $employer->name = $employerData['name'];
        $employer->email = $employerData['email'];
        $employer->password = bcrypt($employerData['password']);
        $employer->contacts = $employerData['contacts'];

        $employer->save();

        return redirect(route('rab-login'));
    }

    public function rablogin (Request $request) {
        $employerInfo = $request->only('email', 'password');

        $validator = Validator::make($employerInfo, [
           'email' => 'required|email:rfc, dns, filter',
           'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect(route('rab-login'))
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::guard('employers')->attempt($employerInfo)){
            return redirect('/index-employer');
        }

        return redirect(route('rab-login'))
            ->withErrors(['auth_error'=>'Email или пароль введены некорректно'])
            ->withInput();
    }

    public function rablogout () {
        Auth::logout();
        return redirect('/');
    }

    public function forgetPasswordPage() {
        return view('forgett-password');
    }

    public function resetPasswordPage(Request $request, $token) {
        return view('resett-password', ['email' => $request->email, 'token' => $token]);
    }

    public function forgetPassword(Request $request) {

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        Mail::send('resett-password-email', ['token' => $token, 'email' => $request->email], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        // event(new PasswordResetRequested($request->email, $token));

        return back()->with('message', 'Письмо отправлено на почту!');
    }

    public function resetPassword(Request $request) {

        $isRequestValid = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if(!$isRequestValid){
            return back()->with('message', 'Данные некорректны');
        }

        Employer::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return redirect('/rab-login')->with('message', 'Пароль обновлен!');
    }
}
