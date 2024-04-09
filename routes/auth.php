<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RestPasswordController;
use App\Http\Controllers\Auth\AuthenticationController;

Route::get('/login', [AuthenticationController::class, "login"])->name("login");
Route::get('/register', [AuthenticationController::class, "register"])->name("register");
Route::post('/login', [AuthenticationController::class, "postLogin"])->name("auth.login");
Route::post('/register', [AuthenticationController::class, "postRegister"])->name("auth.register");
Route::get('/otp', [RestPasswordController::class, 'otpView'])->name("otp");
Route::post('/verifyOTP', [RestPasswordController::class, 'verifyOTP'])->name("verifyOTP");
Route::get('/reset', [RestPasswordController::class, "resetView"])->name("reset");


Route::middleware('verifyOTP')->group(function () {
    Route::post('/postReset', [RestPasswordController::class, "postReset"])->name("postReset");
});

Route::middleware('auth')->group(function (){
    Route::post('/logout', [AuthenticationController::class, "logout"])->name("logout");
    Route::get('/change-password', [AuthenticationController::class, "changePassword"])->name("change-password");
    Route::post('/change-password', [AuthenticationController::class, "PostChangePassword"])->name("auth.change-password");
    Route::get('/reset-password', [RestPasswordController::class, "resetPasswordView"])->name("reset-password");
    Route::post('/reset-password', [RestPasswordController::class, "resetPassword"])->name("auth.reset-password");
});
