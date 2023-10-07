<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Summary;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index () {
        return view('index');
    }

    public function indexapplicant () {
        $vacancies = Vacancy::orderBy('title')->take(10)->get();


        return view('indexapplicant', ['vacancies' => $vacancies]);
    }

    public function indexemployer () {
        $summaries =Summary::orderBy('title')->take(10)->get();


        return view('indexemployer', ['summaries' => $summaries]);
    }

    public function login () {
        return view ('login');
    }

    public function signup () {
        return view ('sign-up');
    }

    public function rabpage() {
        return view ('rab-page');
    }

    public function rablogin () {
        return view ('rab-login');
    }

    public function rabsignup () {
        return view('rab-signup');
    }

    public function addsum () {
        return view('add-sum');
    }

    public function addvac () {
        return view('add-vac');
    }

    public function singlesum ($id) {
        $summary = Summary::findOrFail($id);

        return view('single-sum', ['summary' => $summary]);
    }

    public function singlevac ($id) {
        $vacancy = Vacancy::findOrFail($id);

        return view('single-vac', ['vacancy' => $vacancy]);
    }

    public function profile () {
        $applicant = Auth::user();
        $summaries = Summary::where('author_id', $applicant->id)
            ->orderBy('title')->take(10)->get();


        return view('profile', ['summaries' => $summaries]);
    }

    public function rabprofile () {
        $employer = Auth::guard('employers')->user();
        $vacancies = Vacancy::where('author_id', $employer->id)
            ->orderBy('title')->take(10)->get();

        return view('rab-profile', ['vacancies' => $vacancies]);
    }

    public function profilesum ($id) {
        $summary = Summary::findOrFail($id);

        return view('profile-sum', ['summary' => $summary]);
    }

    public function profilevac ($id) {
        $vacancy = Vacancy::findOrFail($id);

        return view('profile-vac', ['vacancy' => $vacancy]);
    }

    public function edit($id)
    {
        $summary = Summary::findOrFail($id);
        return view('editsum', compact('summary'));
    }

    public function editvac ($id) {
        $vacancy = Vacancy::findOrFail($id);
        return view('editvac', compact('vacancy'));
    }
}
