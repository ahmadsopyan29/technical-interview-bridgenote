<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\PositionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('logout', [AuthController::class, 'logout']);

    Route::get('users', [UserController::class, 'index']);
    Route::post('insertuser', [UserController::class, 'insert']);
    Route::get('user/{id}', [UserController::class, 'edit']);
    Route::put('update', [UserController::class, 'update']);
    Route::delete('deleteuser/{id}', [UserController::class, 'delete']);

    Route::post('insertposition', [PositionController::class, 'insert']);
    Route::delete('deleteposition/{user_id}', [PositionController::class, 'delete']);
    Route::get('position/{user_id}', [PositionController::class, 'edit']);
    Route::put('updateposition', [PositionController::class, 'update']);
});
