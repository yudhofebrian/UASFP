<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatahpController;
use App\Http\Controllers\AuthController;

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

Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);
 
Route::group(['middleware' => 'auth'], function () {
    Route::resource('list', DatahpController::class);
    Route::get('exportpdf',[DatahpController::class, 'exportpdf'])->name('exportpdf');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
 
});