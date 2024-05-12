<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
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

Route::get('/', [IndexController::class, '__invoke'])->name('login');

Route::get('/searchjob', function () {
    return view('search-jobs');
})->name('searchjob');

// samo za priakaz Davidovih vidzeta
Route::get('/widgets', function () {
    return view('user-profile');
});

Route::get('/user', [UserController::class, 'show'])->middleware('auth');
Route::get('/logout', [AuthController::class, 'signOut']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
