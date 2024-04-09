<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\AdminController;
use App\Http\Controllers\dashboard\ItemsController;
use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\ReservationController;


/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Admin Authentication
Route::middleware('checkAdmin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, "index"])->name('dashboard');
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/admin/change-password', [AdminController::class, 'changePasswordView']);
    Route::post('/admin/change-password', [AdminController::class, 'changePassword'])->name('admin.change-password');
});

// Admin Operations
Route::middleware('checkAdmin')->group(function () {
    Route::get('/dashboard/items/trashed', [ItemsController::class, 'trashed'])->name('dashboard.items.trashed');
    Route::delete('/dashboard/items/{item}/force-delete', [ItemsController::class, 'forceDelete'])->name('dashboard.items.force-delete');
    Route::put('/dashboard/items/{item}/restore', [ItemsController::class, 'restore'])->name('dashboard.items.restore');
    Route::resource('/dashboard/items', ItemsController::class)->names('dashboard.items');


    Route::get('/dashboard/categories/trashed', [CategoryController::class, 'trashed'])->name('dashboard.categories.trashed');
    Route::delete("/dashboard/categories/{category}/force-delete", [CategoryController::class, 'forceDelete'])->name('dashboard.categories.force-delete');
    Route::put('/dashboard/categories/{category}/restore', [CategoryController::class, 'restore'])->name('dashboard.categories.restore');
    Route::resource('/dashboard/categories', CategoryController::class)->names('dashboard.categories');


    Route::get('/dashboard/reservations/trashed', [ReservationController::class, 'trashed'])->name('dashboard.reservations.trashed');
    Route::delete('/dashboard/reservations/{reservation}/force-delete', [ReservationController::class, 'forceDelete'])->name('dashboard.reservations.force-delete');
    Route::put('/dashboard/reservations/{reservation}/restore', [ReservationController::class, 'restore'])->name('dashboard.reservations.restore');
    Route::put('/dashboard/reservations/{reservation}/status', [ReservationController::class, 'updateStatus'])->name('dashboard.reservations.status');
    Route::resource('/dashboard/reservations', ReservationController::class)->names('dashboard.reservations');
});
