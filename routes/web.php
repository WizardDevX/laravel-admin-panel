<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;

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

/* Dashboard Routes */

Route::middleware(['web', 'auth:web'])->prefix('dashboard')->group(function () {

    Route::get('add', function () {
        return view('admin.addUser');
    });

    Route::get('{order?}', [UserController::class, 'getUsers']);

    Route::post('add', [UserController::class, 'createUser'])->name('add');

    Route::get('update/{id}', [UserController::class, 'updateUserView']);

    Route::put('update/{id}', [UserController::class, 'updateUser'])->name('update');

    Route::get('delete/{id}', [UserController::class, 'deleteUser'])->name('delete');
});



/* Dashboard Routes */
