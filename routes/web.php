<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Auth\RestPasswordController;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Front\ReservationController;

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

Route::get('/', [FrontController::class, "index"])->name("front.index");
Route::get('/about', [FrontController::class, "about"])->name("front.about");
Route::get('/menu', [FrontController::class, "menu"])->name("front.menu");
Route::resource('reservations', ReservationController::class);



require __DIR__.'/dashboard.php';
require __DIR__.'/auth.php';
