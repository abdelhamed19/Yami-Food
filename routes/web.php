<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Auth\RestPasswordController;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\front\CheckOutController;
use App\Http\Controllers\Front\OrderController;
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
Route::resource('reservation',ReservationController::class);
Route::middleware("auth")->group(function(){
    Route::get('checkout',[CheckOutController::class,'viewCheckOut']);
    Route::put('update/quantity/{uuid}',[OrderController::class, "editQuantity"])->name('editQuantity');
    Route::delete('delete/item/{uuid}',[OrderController::class,'deleteItem'])->name('deleteItem');
    Route::get('/order', [OrderController::class, "index"])->name("order.index");
    Route::post('/order/add-item', [OrderController::class, "addItem"])->name("order.addItem");
});


require __DIR__.'/dashboard.php';
require __DIR__.'/auth.php';
