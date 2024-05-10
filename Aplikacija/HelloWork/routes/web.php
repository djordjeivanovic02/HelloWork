<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use App\Models\CompanyInfo;
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

Route::get('/', [IndexController::class, '__invoke'])->name('login');

Route::get('/searchjob', function () {
    return view('search-jobs', ['user' => auth()->user()]);
})->name('searchjob');

// samo za priakaz Davidovih vidzeta
Route::get('/widgets', function () {
    return view('parts.widgets');
});

Route::middleware('auth')->group(function () {
    Route::get('/user', [UserController::class, 'show']);
    Route::get('/logout', [AuthController::class, 'signOut']);
    Route::post('/updateCompanyData', [CompanyController::class, 'updateCompanyData']);
});
Route::post('/updateUserData', [UserController::class, 'updateUserData']);
Route::post('/deleteUserData', [UserController::class, 'deleteProfile']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/job', [JobController::class, 'show']);
