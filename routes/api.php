<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'admin'],function () {

    //login
    Route::post('/login',[\App\Http\Controllers\Api\AdminAuthController::class, 'login']);
    //create admin
    Route::post('/admins/create',[\App\Http\Controllers\Api\AdminAuthController::class, 'createAdmin']);
    //update profile
    Route::post('/profile/update',[\App\Http\Controllers\Api\AdminAuthController::class, 'updateProfile']);
    //get admin
    Route::get('/admin', [\App\Http\Controllers\Api\AdminAuthController::class, 'getAdmin']);


});

Route::group(['prefix' => 'auth'],function () {

    //login
    Route::post('/login',[\App\Http\Controllers\Api\UserAuthController::class, 'login']);
    //create user
    Route::post('/user/create',[\App\Http\Controllers\Api\UserAuthController::class, 'createUser']);
    //get user
    Route::get('/user', [\App\Http\Controllers\Api\UserAuthController::class, 'getUser']);
    //logout
    Route::post('/logout', [\App\Http\Controllers\Api\UserAuthController::class, 'logout']);
    //updata profile
    Route::post('/profile/update', [\App\Http\Controllers\Api\UserAuthController::class, 'updateProfile']);


});