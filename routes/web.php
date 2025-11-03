
    
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
use App\Http\Controllers\AdminJobController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\GuestJobController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\CVController;

// Route::get('/', function () {
//     return view('guest_jobs');
// });

// ✅ PUBLIC ROUTES - Accessible by guest and authenticated users
Route::get('/', [GuestJobController::class, 'index'])->name('guest.jobs.index');
Route::get('/browse-jobs', [GuestJobController::class, 'index'])->name('browse.jobs'); // Replaces AdminJobController
Route::get('/guest/jobs/search', [GuestJobController::class, 'search'])->name('guest.jobs.search');
Route::get('/guest/jobs/{id}', [GuestJobController::class, 'show'])->name('guest.jobs.show');
Route::get('/guest/category/{slug}', [GuestJobController::class, 'category'])->name('guest.jobs.category');

// ✅ Static public pages
Route::get('/about-us', function () {
    return view('about');
})->name('about');

Route::get('/help', function () {
    return view('help');
})->name('help');

// ✅ Contact Us (Form + Submission)
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');

// ✅ Privacy Policy
Route::get('/privacy-policy', function () {
    return view('policy.privacy');
})->name('privacy.policy');
Route::get('/browse_jobs',[BrowseJobController::class,'showjob'])->name('browse.jobs');
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
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('/logout', [CustomAuthController::class, 'logout'])->name('logout');
    Route::get('/browse-jobs',[AdminJobController::class,'showjob'])->name('browse.jobs');
    Route::get('/adminresetpassword', [ResetPasswordController::class, 'adminshowResetForm'])->name('admin-reset-password.form');
    Route::post('/adminsend-verification-code', [PasswordResetController::class, 'adminsendVerificationCode'])->name('adminsend.verification.code');
    Route::post('/update_password', [PasswordResetController::class, 'adminupdatePassword'])->name('admin.update-password');
    Route::get('/adminenter-verification-code', [PasswordResetController::class, 'adminshowVerificationForm'])->name('user.adminenter-verification-code');
    Route::post('/verify-code', [PasswordResetController::class, 'verifyCode'])->name('user.verify-code');
    //profile section
    Route::get('/edit-profile', [UserController::class, 'admineditProfile'])->name('edit.profile');
    Route::post('/edit-profile', [UserController::class, 'adminupdateProfile'])->name('update.profile');  
    
    Route::post('/store_job', [AdminJobController::class, 'storeJob'])->name('store.job');
    Route::get('/post', [AdminJobController::class, 'createJob'])->name('admin.job');
    Route::get('/job/{id}', [AdminJobController::class, 'show'])->name('jobs.show');
    Route::get('/job/{id}/apply', [AdminJobController::class, 'apply'])->name('jobs.apply');
    Route::get('/jobs-view', [AdminJobController::class, 'index'])->name('adminjobs.view');
    Route::get('/jobs', [AdminJobController::class, 'index'])->name('jobs.view');
    Route::get('/applications/create/{job}', [DashboardController::class, 'index'])->name('applications.feature');
    Route::get('/application/create/{job}', [DashboardController::class, 'show'])->name('application.latest');
    Route::get('/application', [ApplicationController::class, 'admin'])->name('admin.index');
    Route::get('/my-job-applications', [ApplicationController::class, 'myApplications'])->name('applications.my');
    Route::get('/admin/user-roles', [UserManagementController::class, 'showUserRoles'])->name('admin.user.roles');

});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [CustomAuthController::class, 'logout'])->name('logout');
    Route::get('/resetpassword', [ResetPasswordController::class, 'showResetForm'])->name('reset-password.form');
    Route::post('/send-verification-code', [PasswordResetController::class, 'sendVerificationCode'])->name('send.verification.code');
    Route::post('/update-password', [PasswordResetController::class, 'updatePassword'])->name('user.update-password');
    Route::get('/enter-verification-code', [PasswordResetController::class, 'showVerificationForm'])->name('user.enter-verification-code');
    Route::post('/verify-code', [PasswordResetController::class, 'verifyCode'])->name('user.verify-code');
    //profile section
    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
    Route::post('/profile/edit', [UserController::class, 'updateProfile'])->name('profile.update');  
});
//permission based routes
    // Route::middleware(['auth', 'permission:browse jobs'])->group(function () {
    //     Route::get('/browse_jobs',[BrowseJobController::class,'showjob'])->name('browse.jobs');
    // });
    Route::middleware(['auth', 'permission:store job'])->group(function () {
        Route::post('/store-job', [BrowseJobController::class, 'storeJob'])->name('store.job');
    });
    Route::middleware(['auth', 'permission:post job'])->group(function () {
        Route::get('/post-job', [BrowseJobController::class, 'createJob'])->name('post.job');
    });
    Route::middleware(['auth', 'permission:jobs show'])->group(function () {
        Route::get('/job/{id}', [BrowseJobController::class, 'show'])->name('jobs.show');
    });
    Route::middleware(['auth', 'permission:jobs apply'])->group(function () {
        Route::get('/job/{id}/apply', [BrowseJobController::class, 'apply'])->name('jobs.apply');
    });
    Route::middleware(['auth', 'permission:jobs view'])->group(function () {
        Route::get('/jobs', [BrowseJobController::class, 'index'])->name('jobs.view');
    });
    Route::middleware(['auth', 'permission:jobs search'])->group(function () {
        Route::get('/jobs', [BrowseJobController::class, 'index'])->name('jobs.view');
    });
    Route::middleware(['auth', 'permission:applications feature'])->group(function () {
        Route::get('/applications/create/{job}', [DashboardController::class, 'index'])->name('applications.feature');
    });
    Route::middleware(['auth', 'permission:applications latest'])->group(function () {
        Route::get('/application/create/{job}', [DashboardController::class, 'show'])->name('application.latest');
    });
    Route::middleware(['auth', 'permission:applications create'])->group(function () {
        Route::get('/apply/{job}', [ApplicationController::class, 'create'])->name('applications.create');
    });
    Route::middleware(['auth', 'permission:applications store'])->group(function () {
        Route::post('/apply', [ApplicationController::class, 'store'])->name('applications.store');
    });
    Route::middleware(['auth', 'permission:applications index'])->group(function () {
        Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
    });
    Route::middleware(['auth', 'permission:applications my'])->group(function () {
        Route::get('/my-job-applications', [ApplicationController::class, 'myApplications'])->name('applications.my');
    });
    // Route::middleware(['auth', 'permission:about'])->group(function () {
    //     Route::get('/about-us', function () {return view('about');});
    // });
    // Route::middleware(['auth', 'permission:help'])->group(function () {
    //     Route::get('/help', function () {return view('help');})->name('help');
    // });
    // //contact
    // Route::middleware(['auth', 'permission:contact form'])->group(function () {
    //     Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
    // });
    // Route::middleware(['auth', 'permission:contact submit'])->group(function () {
    //     Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');
    // });
    
    Route::middleware(['auth', 'permission:recommend me'])->group(function () {
        Route::get('/recommend-me', [DashboardController::class, 'recommendMe'])->name('recommend.me');
    });



// Route::middleware(['auth', 'permission:admin user roles'])->group(function () {
//     Route::get('/admin/user-roles', [UserManagementController::class, 'showUserRoles'])->name('admin.user.roles');
//     });


Route::middleware(['auth', 'permission:jobs search'])->group(function () {
    Route::get('/jobs/search', [BrowseJobController::class, 'search'])->name('jobs.search');
    });

    Route::post('/applications/{id}/accept', [ApplicationController::class, 'accept'])->name('applications.accept');
    Route::post('/applications/{id}/reject', [ApplicationController::class, 'reject'])->name('applications.reject');
    Route::get('/profile/view', [UserController::class, 'viewProfile'])->name('profile.view');
    // Route::get('/privacy-policy', function () {
    //     return view('policy.privacy');
    // })->name('privacy.policy');


Route::middleware(['auth'])->group(function () {
    Route::get('/trainings', [TrainingController::class, 'list'])->name('trainings.list');
    Route::get('/trainings/enroll/{id}', [TrainingController::class, 'showForm'])->name('trainings.enroll');
    Route::post('/trainings/enroll/{id}', [TrainingController::class, 'submitForm']);
    Route::get('/trainings/payment/{id}', [TrainingController::class, 'showPayment'])->name('trainings.payment');
    Route::post('/trainings/payment/{id}', [TrainingController::class, 'processPayment']);
    Route::get('/trainings/token/{id}', [TrainingController::class, 'downloadToken'])->name('trainings.token');
});
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/trainings/create', [TrainingController::class, 'create'])->name('trainings.create');
    Route::post('/trainings', [TrainingController::class, 'store'])->name('trainings.store');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/cv/create', [CvController::class,'create'])->name('cv.create');
    Route::post('/cv/store', [CvController::class,'store'])->name('cv.store');
    Route::get('/cv', [CvController::class,'show'])->name('cv.show');
    Route::get('/cv/download', [CvController::class,'download'])->name('cv.download');
});

Route::get('/cv/preview/{template}', function ($template) {
    $fakeData = [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'phone' => '+977-9800000000',
        'address' => 'Kathmandu, Nepal',
        'education' => "Bachelor's in CS, TU\n+2 Science, NIST",
        'experience' => "Web Developer at XYZ\nIntern at ABC",
        'skills' => 'Laravel, Vue.js, Bootstrap',
    ];
    return view('cv.templates.' . $template, ['data' => $fakeData]);
})->name('cv.preview');



// Route::get('/', [GuestJobController::class, 'index'])->name('guest.jobs.index');

// // Route::get('/guest/jobs', [GuestJobController::class, 'index'])->name('guest.jobs.index');
// Route::get('/guest/jobs/search', [GuestJobController::class, 'search'])->name('guest.jobs.search');
// Route::get('/guest/jobs/{id}', [GuestJobController::class, 'show'])->name('guest.jobs.show');
// Route::get('/guest/category/{slug}', [GuestJobController::class, 'category'])->name('guest.jobs.category');
