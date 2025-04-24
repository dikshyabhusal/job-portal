<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CustomAuthController;
use App\Http\Controllers\Auth\ForgotPasswordController; // Corrected namespace
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegisteredMail;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\auth\UserController;
use App\Http\Controllers\BrowseJobController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [CustomAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [CustomAuthController::class, 'login'])->name('custom.login');

    Route::get('/register', [CustomAuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [CustomAuthController::class, 'register'])->name('custom.register');
    Route::get('forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('forgot.password');
    Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetToken'])->name('forgot.password.send');
    Route::get('/verify-token', [ForgotPasswordController::class, 'showtokenform'])->name('verify.token.form');
    Route::post('/verify-token', [ForgotPasswordController::class, 'verifyToken'])->name('verify.token');
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetPasswordForm'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('password.update');
    Route::post('/send-reset-token-again', [ForgotPasswordController::class, 'sendResetTokenAgain'])->name('send.token.again');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/browse_jobs',[BrowseJobController::class,'showjob'])->name('browse.jobs');
    Route::post('/logout', [CustomAuthController::class, 'logout'])->name('logout');
    Route::get('/resetpassword', [ResetPasswordController::class, 'showResetForm'])->name('reset-password.form');
    Route::post('/send-verification-code', [PasswordResetController::class, 'sendVerificationCode'])->name('send.verification.code');
    Route::post('/update-password', [PasswordResetController::class, 'updatePassword'])->name('user.update-password');
    Route::get('/enter-verification-code', [PasswordResetController::class, 'showVerificationForm'])->name('user.enter-verification-code');
    Route::post('/verify-code', [PasswordResetController::class, 'verifyCode'])->name('user.verify-code');

    //profile section
    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
    Route::post('/profile/edit', [UserController::class, 'updateProfile'])->name('profile.update');


    //posting job
    Route::get('/post-job', [BrowseJobController::class, 'createJob'])->name('post.job');
    Route::post('/store-job', [BrowseJobController::class, 'storeJob'])->name('store.job');
    Route::get('/jobs', [BrowseJobController::class, 'showjob'])->name('jobs.index');
    Route::get('/job/{id}', [BrowseJobController::class, 'show'])->name('jobs.show');
    Route::get('/job/{id}/apply', [BrowseJobController::class, 'apply'])->name('jobs.apply');
    Route::get('/jobs', [BrowseJobController::class, 'index'])->name('jobs.view');
    Route::get('/jobs/search', [BrowseJobController::class, 'search'])->name('jobs.search');

    //latest job
    Route::get('/applications/create/{job}', [DashboardController::class, 'index'])->name('applications.create');
    Route::get('/application/create/{job}', [DashboardController::class, 'show'])->name('application.create');

    //recommendation
    Route::get('/recommend-me', [DashboardController::class, 'recommendMe'])->name('recommend.me');

    
    //job application


    Route::get('/apply/{job}', [ApplicationController::class, 'create'])->name('applications.create');
    Route::post('/apply', [ApplicationController::class, 'store'])->name('applications.store');

    //view applications
    Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
    //user view
    Route::get('/my-job-applications', [ApplicationController::class, 'myApplications'])->name('applications.my');

});
//about-us
Route::get('/about-us', function () {
    return view('about');
});

Route::get('/help', function () {
    return view('help');
})->name('help');

//contact
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');







