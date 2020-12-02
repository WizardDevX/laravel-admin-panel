<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PdfController;

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

/* Login */

Route::middleware(['web', 'guest'])->group(function () {
    Route::get('/', function () {
        return view('index');
    })->name('login');

    Route::post('/login', [LoginController::class, 'login']);
});

/* Login */

/* Reset Password*/

Route::middleware(['web', 'guest'])->group(function () {

    Route::get('forgotPassword', [PasswordController::class, 'getForgotPassword'])->name('password.request');
    Route::post('forgotPassword', [PasswordController::class, 'forgotPassword'])->name('password.email');

    Route::get('resetPassword/{token}', [PasswordController::class, 'getResetPassword'])->name('password.reset');
    Route::post('resetPassword', [PasswordController::class, 'resetPassword'])->name('password.update');
});

/* Reset Password */


/* Dashboard Routes */

Route::middleware(['web', 'auth'])->prefix('dashboard')->group(function () {

    Route::get('logout', [LoginController::class, 'logout']);

    Route::get('add', function () {
        return view('admin.addUser');
    });

    Route::get('profile', [UserController::class, 'profile'])->name('profile');

    Route::get('{order?}', [UserController::class, 'getUsers']);

    Route::post('add', [UserController::class, 'createUser'])->name('add');

    Route::get('update/{id}', [UserController::class, 'updateUserView']);

    Route::put('update/{id}', [UserController::class, 'updateUser'])->name('update');

    Route::get('delete/{id}', [UserController::class, 'deleteUser'])->name('delete');
});
/* Dashboard Routes */

/* PDF */
Route::middleware(['web', 'auth'])->prefix('pdf')->group(function () {

    Route::get('/', [PdfController::class, 'getPdf']);
});
/* PDF */