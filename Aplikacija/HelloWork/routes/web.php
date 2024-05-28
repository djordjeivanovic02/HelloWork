<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\NewJobController;
use App\Http\Controllers\SavedAdController;
use App\Http\Controllers\UserController;
use App\Models\User;
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

Route::middleware('auth')->group(function () {
    Route::middleware('check.type:0')->group(function () {
        //only admin routes
    });
    Route::middleware('check.type:1')->group(function () {
        Route::post('/updateUserData', [UserController::class, 'updateUserData']);
        Route::get('/user-change-profile', [UserController::class, 'showDashboard']);
        Route::get('/user-cv', function () {
            return view('/user-cv', [
                'currentUser' => auth()->user(),
                'user' => auth()->user()
            ]);
        });
        Route::get('/user-change-password', function () {
            return view('/user-change-password', [
                'currentUser' => auth()->user(),
                'user' => auth()->user()
            ]);
        });
        Route::get('/user-applications', function () {
            return view('/user-applications', [
                'currentUser' => auth()->user(),
                'user' => auth()->user()
            ]);
        });
        Route::get('/user-saved-ads', [SavedAdController::class, 'show']);
        Route::post('/apply/{ad}', [ApplicationsController::class, 'apply']);
        Route::post('/user-upload-logo', [UserController::class, 'uploadLogo']);
        Route::post('/user-update-profile', [UserController::class, 'updateUserData']);
        Route::post('/delete-saved-ad', [SavedAdController::class, 'deleteSavedAd']);
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
        Route::get('/company-applications', function () {
            return view('/company-applications', [
                'currentUser' => auth()->user(),
                'user' => auth()->user()
            ]);
        });
        Route::post('/company-upload-logo', [CompanyController::class, 'uploadLogo']);
        Route::post('/company-update-profile', [CompanyController::class, 'updateCompanyData']);
        Route::post('/company-add-new-job', [AdController::class, 'createAd']);
        Route::delete('/company-delete-job/{id}', [AdController::class, 'deleteAd']);
    });
    Route::get('/logout', [AuthController::class, 'signOut']);
    Route::post('/deleteUserData', [UserController::class, 'deleteProfile']);
    Route::post('/change-password', [UserController::class, 'changePassword']);
    Route::post('/save-ad', [SavedAdController::class, 'saveAd']);
    Route::post('/check-is-saved', [SavedAdController::class, 'checkIsSaved']);
});

Route::get('/user/{id}', [UserController::class, 'show']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/job/{id}', [AdController::class, 'show']);
Route::get('/company/{id}', [CompanyController::class, 'show']);
Route::get('/', [IndexController::class, '__invoke'])->name('login');
Route::get('/searchjob', function () {
    return view('search-jobs', ['currentuser' => auth()->user()]);
})->name('searchjob');
// samo za priakaz Davidovih vidzeta
Route::get('/widgets', function () {
    return view('parts.widgets');
});
