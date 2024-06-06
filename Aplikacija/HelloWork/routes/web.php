<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\NewJobController;
use App\Http\Controllers\SavedAdController;
use App\Http\Controllers\SupportMessageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth']], function () {
    Route::middleware('check.type:0')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'show']);
        Route::get('/for-check', [AdminController::class, 'forCheck']);
        Route::get('/candidates', [AdminController::class, 'candidates']);
        Route::put('/approve-ad/{id}', [AdminController::class, 'approveAd']);
        Route::put('/reject-ad/{id}', [AdminController::class, 'rejectAd']);
        Route::get('/companies', [AdminController::class, 'companies']);
        Route::delete('/admin-delete-job/{id}', [AdminController::class, 'deleteAd']);
        Route::get('/all-ads', [AdminController::class, 'allAds']);
        Route::get('/admin-support', [AdminController::class, 'support']);
        Route::put('/read-message/{id}', [SupportMessageController::class, 'readMessage']);
    });
    Route::middleware('check.type:1')->group(function () {
        Route::post('/updateUserData', [UserController::class, 'updateUserData']);
        Route::get('/user-change-profile', [UserController::class, 'showDashboard']);
        Route::get('/user-cv', [UserController::class, 'showUserCV']);
        Route::get('/user-change-password', function () {
            return view('/user-change-password', [
                'currentUser' => auth()->user(),
                'user' => auth()->user()
            ]);
        });
        Route::get('/user-applications', [UserController::class, 'showApplications']);
        Route::get('/user-saved-ads', [SavedAdController::class, 'show']);
        Route::post('/apply/{ad}', [ApplicationsController::class, 'apply']);
        Route::post('/user-upload-logo', [UserController::class, 'uploadLogo']);
        Route::post('/user-update-profile', [UserController::class, 'updateUserData']);
        Route::post('/delete-saved-ad', [SavedAdController::class, 'deleteSavedAd']);
        Route::post('/upload-cv', [UserController::class, 'uploadCV']);
        Route::delete('/delete-cv', [UserController::class, 'deleteCV']);
        Route::post('/apply-for-job', [ApplicationsController::class, 'apply']);
        Route::post('/cancel-apply', [ApplicationsController::class, 'cancelApply']);
        Route::post('/add-previous-job', [UserController::class, 'addPreviousJob']);
        Route::delete('/remove-previous-job/{id}', [UserController::class, 'deletePreviousJob']);
    });
    Route::middleware('check.type:2')->group(function () {
        Route::post('/updateCompanyData', [CompanyController::class, 'updateCompanyData']);
        Route::get('/new-ad', function () {
            return view('/new-ad', [
                'currentUser' => auth()->user(),
                'user' => auth()->user()
            ]);
        });
        Route::get('/change-password', function () {
            return view('/company-change-password', [
                'currentUser' => auth()->user(),
                'user' => auth()->user()
            ]);
        });
        Route::get('/company-change-profile', [CompanyController::class, 'showDashboard']);
        Route::get('/company-manage-jobs', [AdController::class, 'showManageAds']);
        Route::get('/company-applications', [CompanyController::class, 'showApplications']);
        Route::post('/company-upload-logo', [CompanyController::class, 'uploadLogo']);
        Route::post('/company-update-profile', [CompanyController::class, 'updateCompanyData']);
        Route::post('/company-add-new-job', [AdController::class, 'createAd']);
        Route::delete('/company-delete-job/{id}', [AdController::class, 'deleteAd']);
        Route::post('/accept-application', [ApplicationsController::class, 'acceptApplication']);
        Route::post('/return-application', [ApplicationsController::class, 'returnToPending']);
        Route::post('/reject-application', [ApplicationsController::class, 'rejectApplication']);
    });
    Route::delete('/delete-account/{id}', [UserController::class, 'deleteProfile']);
    Route::get('/logout', [AuthController::class, 'signOut']);
    Route::post('/deleteUserData', [UserController::class, 'deleteProfile']);
    Route::post('/change-password', [UserController::class, 'changePassword']);
    Route::post('/save-ad', [SavedAdController::class, 'saveAd']);
    Route::post('/check-is-saved', [SavedAdController::class, 'checkIsSaved']);
});

Route::group(['middleware' => ['verified']], function () {
    Route::post('/login', [AuthController::class, 'login']);
});

Route::get('/user/{id}', [UserController::class, 'show']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/job/{id}', [AdController::class, 'show']);
Route::get('/company/{id}', [CompanyController::class, 'show']);
Route::get('/', [IndexController::class, '__invoke'])->name('login');
Route::get('/searchjob', [AdController::class, 'showSearchJob'])->name('searchjob');
Route::get('/make-cv', function () {
    return view('cv-maker', [
        'user' => auth()->user(),
        'currentUser' => auth()->user()
    ]);
});

Route::get('/verificate-email/{id}', [AuthController::class, 'verifyEmail'])->name('verify-email');
Route::get('/resend-email-verification/{email}', [AuthController::class, 'resendEmailVerification']);
Route::get('/about', function () {
    return view('/about', [
        'currentUser' => auth()->user()
    ]);
});
Route::get('/support', function () {
    return view('/contact', [
        'currentUser' => auth()->user()
    ]);
});

Route::post('/send-message-support', [SupportMessageController::class, 'saveReport']);

// samo za priakaz Davidovih vidzeta
Route::get('/widgets', function () {
    return view('parts.widgets');
});

