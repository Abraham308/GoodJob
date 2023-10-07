<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SumController;
use App\Http\Controllers\VacController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PageController::class, 'index'])->name('main');
Route::get('/index-applicant', [PageController::class, 'indexapplicant'])->name('indexapplicant');
Route::get('/index-employer', [PageController::class, 'indexemployer'])->name('indexemployer');


Route::get('/login', [PageController::class, 'login'])->name('login-page');
Route::post('/login',[ApplicantController::class, 'login'])->name('login');
Route::get('/logout', [ApplicantController::class, "logout"])->name('logout');
Route::get('/sign-up', [PageController::class, 'signup'])->name('signup-page');
Route::post('sign-up', [ApplicantController::class, 'signup'])->name('signup');
Route::get('/rab-page', [PageController::class, 'rabpage'])->name('rab-page');
Route::get('/rab-login', [PageController::class, 'rablogin'])->name('rab-login');
Route::post('/rab-login', [EmployerController::class, 'rablogin'])->name('rablogin');
Route::get('/rab-logout', [EmployerController::class, 'rablogout'])->name('rablogout');
Route::get('/rab-signup', [PageController::class, 'rabsignup'])->name('rab-signup');
Route::post('/rab-signup', [EmployerController::class, 'rabsignup'])->name('rabsignup');


Route::get('/add-sum', [PageController::class, 'addsum'])->name('add-sum');
Route::post('/add-sum', [SumController::class, 'addsum'])->name('addsum');
Route::get('/add-vac', [PageController::class, 'addvac'])->name('add-vac');
Route::post('/add-vac', [VacController::class, 'addvac'])->name('addvac');

Route::get('index-employer/summaries/{id}', [PageController::class, 'singlesum'])->name('singlesum');
Route::get('index-applicant/vacancies/{id}', [PageController::class, 'singlevac'])->name('singlevac');

Route::get('/index-applicant/category/{id}', [VacController::class, 'searchByCategory'])->name('category-search');
Route::get('/index-employer/category/{id}', [SumController::class, 'searchByCategory'])->name('categoryy-search');
Route::get('/index-applicant/search', [VacController::class, 'search'])->name('search');
Route::get('/index-employer/search', [SumController::class, 'search'])->name('searchh');

Route::get('/profile', [PageController::class, 'profile'])->name('profile-page');
Route::get('/rabprofile', [PageController::class, 'rabprofile'])->name('rabprofile-page');

Route::get('/profile/summaries/{id}', [PageController::class, 'profilesum'])->name('profilesum');
Route::get('/rabprofile/vacancies/{id}', [PageController::class, 'profilevac'])->name('profilevac');

Route::delete('/summaries/{id}', [SumController::class, 'destroy'])->name('summary.delete');
Route::delete('/vacancies/{id}', [VacController::class, 'destroy'])->name('vacancy.delete');

Route::get('/profile/summaries/{id}/edit', [PageController::class, 'edit'])->name('summary.edit');
Route::put('/profile/summaries/{id}/update', [SumController::class, 'update'])->name('summary.update');
Route::get('rabprofile/vacancies/{id}/edit', [PageController::class, 'editvac'])->name('vacancy.edit');
Route::put('rabprofile/vacancies/{id}/update', [VacController::class, 'update'])->name('vacancy.update');

Route::get('/forget-password', [ApplicantController::class, 'forgetPasswordPage'])->name('forgetPasswordPage');
Route::get('/reset-password/{token}', [ApplicantController::class, 'resetPasswordPage']);
Route::post('/forget-password', [ApplicantController::class, 'forgetPassword']);
Route::post('/reset-password', [ApplicantController::class, 'resetPassword']);

Route::get('/forgett-password', [EmployerController::class, 'forgetPasswordPage'])->name('forgettPasswordPage');
Route::get('/resett-password/{token}', [EmployerController::class, 'resetPasswordPage']);
Route::post('/forgett-password', [EmployerController::class, 'forgetPassword']);
Route::post('/resett-password', [EmployerController::class, 'resetPassword']);



