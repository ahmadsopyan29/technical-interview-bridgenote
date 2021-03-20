<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', [LoginController::class, 'index'])->name('login.user');
Route::post('/setsession', [LoginController::class, 'setSession'])->name('setSession.user');
Route::middleware(['cek.user.session'])->group(
    function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.user');
        Route::get('/deletesession', [LoginController::class, 'deleteSession'])->name('deleteSession.user');
        Route::get('/users', [UserController::class, 'index'])->name('users.user');
    }
);
