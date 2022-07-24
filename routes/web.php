<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


 //home
Route::view('/', 'welcome.index')->name('welcome');

Route::group(['prefix' => '/', 'middleware' => ['guest']],function () {

    //login admin
    Route::get('admin/login', [App\Http\Controllers\Admin\AdminLoginController::class, 'indexLogin'])->name('login.index');
    Route::post('admin/login/submit', [App\Http\Controllers\Admin\AdminLoginController::class, 'loginAdmin'])->name('admin.login');
    Route::get('admin/logout', [App\Http\Controllers\Admin\AdminLoginController::class, 'adminLogout'])->name('admin.logout');
});

Route::group(['prefix' => 'admin', 'middleware' => ['admin']],function () {

    //dashboard
    Route::get('/dashboard', function () {
        // set layout sesion(key)
        session(['layout' => 'compact']);
        return view('admin-dashboard.dashboardv1');
    })->name('dashboard');
    //crud admin
    Route::resource('/admins', 'App\Http\Controllers\Admin\AdminController');
    //upload file
    Route::get('/admins/upload/{id}', [App\Http\Controllers\Admin\AdminController::class, 'upload']);
    Route::post('/admins/upload/{id}', [App\Http\Controllers\Admin\AdminController::class, 'UploadImage'])->name('admins.upload');
    //crud user
    Route::resource('/users', 'App\Http\Controllers\User\UserController');
    //export & emport user
    Route::get('/file-import',[App\Http\Controllers\User\UserController::class,'importView'])->name('import-view');
    Route::post('/import',[App\Http\Controllers\User\UserController::class,'import'])->name('import');
    Route::get('/export-users',[App\Http\Controllers\User\UserController::class,'exportUsers'])->name('export-users');

});

Route::group(['prefix' => 'auth', 'middleware' => ['auth']],function () {
    //home
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
