<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ApplicantController extends Controller
{
    public function signup (Request $request) {
        $applicantData = $request->all();
        $validator = Validator::make($applicantData, [
            'email' => 'required|unique:applicants|email:rfc, dns, filter',
            'name' => 'required',
            'password' => 'required',
            'contacts' => 'required|unique:applicants',
        ]);

        if ($validator->fails()) {
            return redirect(route('signup-page'))
                ->withErrors($validator)
                ->withInput();
        }

        $applicant = new Applicant();
        $applicant->name = $applicantData['name'];
        $applicant->email = $applicantData['email'];
        $applicant->password = bcrypt($applicantData['password']);
        $applicant->contacts = $applicantData['contacts'];

        $applicant->save();

        return redirect(route('login-page'));
    }

    public function login (Request $request) {
        $applicantInfo = $request->only('email', 'password');

        $validator = Validator::make($applicantInfo, [
           'email' => 'required|email:rfc, dns, filter',
           'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect(route('login-page'))
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::attempt($applicantInfo)){
            return redirect('/index-applicant');
        }

        return redirect(route('login-page'))
            ->withErrors(['auth_error' => 'Email или пароль введены некорректно'])
            ->withInput();
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }


    public function forgetPasswordPage() {
        return view('forget-password');
    }

    public function resetPasswordPage(Request $request, $token) {
        return view('reset-password', ['email' => $request->email, 'token' => $token]);
    }

    public function forgetPassword(Request $request) {

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        Mail::send('reset-password-email', ['token' => $token, 'email' => $request->email], function($message) use($request){
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

        Applicant::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return redirect('/login')->with('message', 'Пароль обновлен!');
    }
}
