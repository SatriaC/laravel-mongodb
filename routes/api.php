<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\TipeSuspensiController;
use App\Http\Controllers\TipeTransmisiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
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

Route::group(['middleware' => 'auth:api'], function () {
    Route::group(['prefix' => 'cart'], function () {
        Route::get('/', [CartController::class, 'show'])->name('cart.show');
        Route::post('/update', [CartController::class, 'updateOrCreate'])->name('cart.update');
    });
    Route::group(['prefix' => 'order'], function () {
        Route::get('/', [OrderController::class, 'index'])->name('order.index');
        Route::post('/add', [OrderController::class, 'store'])->name('order.store');
        Route::get('/{id}', [OrderController::class, 'show'])->name('order.show');
        Route::post('/{id}/update', [OrderController::class, 'update'])->name('order.update');
        Route::get('/{id}/items', [OrderItemController::class, 'index'])->name('order.item.index');
    });
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login'])->name('login');
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::post('/add', [UserController::class, 'store'])->name('user.store');
    Route::get('/{id}', [UserController::class, 'show'])->name('user.show');
    Route::post('/{id}/update', [UserController::class, 'update'])->name('user.update');
    Route::post('/{id}/delete', [UserController::class, 'destroy'])->name('user.delete');
});

Route::group(['prefix' => 'kendaraan'], function () {
    Route::get('/', [KendaraanController::class, 'index'])->name('kendaraan.index');
    Route::post('/add', [KendaraanController::class, 'store'])->name('kendaraan.store');
    Route::get('/{id}', [KendaraanController::class, 'show'])->name('kendaraan.show');
    Route::post('/{id}/update', [KendaraanController::class, 'update'])->name('kendaraan.update');
    Route::post('/{id}/delete', [KendaraanController::class, 'destroy'])->name('kendaraan.delete');
});

Route::group(['prefix' => 'mobil'], function () {
    Route::get('/', [MobilController::class, 'index'])->name('mobil.index');
    Route::post('/add', [MobilController::class, 'store'])->name('mobil.store');
    Route::get('/{id}', [MobilController::class, 'show'])->name('mobil.show');
    Route::post('/{id}/update', [MobilController::class, 'update'])->name('mobil.update');
    Route::post('/{id}/delete', [MobilController::class, 'destroy'])->name('mobil.delete');
});

Route::group(['prefix' => 'motor'], function () {
    Route::get('/', [MotorController::class, 'index'])->name('motor.index');
    Route::post('/add', [MotorController::class, 'store'])->name('motor.store');
    Route::get('/{id}', [MotorController::class, 'show'])->name('motor.show');
    Route::post('/{id}/update', [MotorController::class, 'update'])->name('motor.update');
    Route::post('/{id}/delete', [MotorController::class, 'destroy'])->name('motor.delete');
});

Route::group(['prefix' => 'tipe-suspensi'], function () {
    Route::get('/', [TipeSuspensiController::class, 'index'])->name('tipe.suspensi.index');
    Route::post('/add', [TipeSuspensiController::class, 'store'])->name('tipe.suspensi.store');
    Route::get('/{id}', [TipeSuspensiController::class, 'show'])->name('tipe.suspensi.show');
    Route::post('/{id}/update', [TipeSuspensiController::class, 'update'])->name('tipe.suspensi.update');
    Route::post('/{id}/delete', [TipeSuspensiController::class, 'destroy'])->name('tipe.suspensi.delete');
});

Route::group(['prefix' => 'tipe-transmisi'], function () {
    Route::get('/', [TipeTransmisiController::class, 'index'])->name('tipe.transmisi.index');
    Route::post('/add', [TipeTransmisiController::class, 'store'])->name('tipe.transmisi.store');
    Route::get('/{id}', [TipeTransmisiController::class, 'show'])->name('tipe.transmisi.show');
    Route::post('/{id}/update', [TipeTransmisiController::class, 'update'])->name('tipe.transmisi.update');
    Route::post('/{id}/delete', [TipeTransmisiController::class, 'destroy'])->name('tipe.transmisi.delete');
});
