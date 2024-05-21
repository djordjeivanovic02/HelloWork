<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdController;
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
    Route::middleware('check.type:0')->group(function(){
        //only admin routes
    });
    Route::middleware('check.type:1')->group(function(){
        Route::get('/user', [UserController::class, 'show']);
        Route::post('/updateUserData', [UserController::class, 'updateUserData']);
        Route::get('/user-change-profile', function() {
            return view('/user-change-profile', [
                'user' => auth()->user()
            ]);
        });
        Route::get('/user-cv', function() {
            return view('/user-cv', [
                'user' => auth()->user()
            ]);
        });
        Route::get('/user-change-password', function() {
            return view('/user-change-password', [
                'user' => auth()->user()
            ]);
        });
        Route::get('/user-applications', function() {
            return view('/user-applications', [
                'user' => auth()->user()
            ]);
        });
        Route::get('/user-saved-ads', function() {
            return view('/user-saved', [
                'user' => auth()->user()
            ]);
        });
        Route::post('/apply/{ad}', [ApplicationsController::class, 'apply']);
    });
    Route::middleware('check.type:2')->group(function(){
        Route::post('/updateCompanyData', [CompanyController::class, 'updateCompanyData']);
        Route::get('/new-ad', function () {
            return view('/new-ad', ['user' => auth()->user()]);
        });
        Route::get('/change-password', function () {
            return view('/company-change-password', ['user' => auth()->user()]);
        });
        Route::get('/company-change-profile', function() {
            return view('/company-change-profile', [
                'user' => User::findOrFail(auth()->id())
            ]);
        });
        Route::get('/company-manage-jobs', function() {
            return view('/company-manage-jobs' ,[
                'user' => auth()->user()
            ]);
        });
        Route::get('/company-applications', function() {
            return view('/company-applications' ,[
                'user' => auth()->user()
            ]);
        });
    });
    Route::get('/user', function(){
        return view('/user' ,[
            'user' => auth()->user()
        ]);
    });
    Route::get('/logout', [AuthController::class, 'signOut']);
    Route::post('/deleteUserData', [UserController::class, 'deleteProfile']);
    Route::post('/change-password', [UserController::class, 'changePassword']);
    Route::post('/save-ad', [SavedAdController::class, 'saveAd']);
    Route::post('/check-is-saved', [SavedAdController::class, 'checkIsSaved']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/job', [AdController::class, 'show']);
Route::get('/company', [CompanyController::class, 'show']);
Route::get('/', [IndexController::class, '__invoke'])->name('login');
Route::get('/searchjob', function () {
    return view('search-jobs', ['user' => auth()->user()]);
})->name('searchjob');
// samo za priakaz Davidovih vidzeta
Route::get('/widgets', function () {
    return view('parts.widgets');
});