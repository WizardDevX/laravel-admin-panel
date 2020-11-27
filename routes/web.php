<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('index');
})->name('login');

/* Dashboard Routes */

Route::get('/dashboard', [UserController::class, 'getUsers']);

Route::get('/dashboard/add', function (Request $request) {
    return view('admin.addUser');
});

Route::post('/dashboard/add', [UserController::class, 'createUser']);

Route::get('/dashboard/update/{id}', [UserController::class, 'updateUserView']);

Route::put('/dashboard/update/{id}', [UserController::class, 'updateUser']);

Route::get('/dashboard/delete/{id}', [UserController::class, 'deleteUser']);

/* Dashboard Routes */
