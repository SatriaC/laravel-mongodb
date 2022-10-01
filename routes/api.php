<?php

use App\Http\Controllers\MobilController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::post('/add', [UserController::class, 'store'])->name('user.store');
    Route::get('/{id}', [UserController::class, 'show'])->name('user.show');
    Route::post('/{id}/update', [UserController::class, 'update'])->name('user.update');
    Route::post('/{id}/delete', [UserController::class, 'destroy'])->name('user.delete');
});

Route::group(['prefix' => 'mobil'], function () {
    Route::get('/', [MobilController::class, 'index'])->name('mobil.index');
    Route::post('/add', [MobilController::class, 'store'])->name('mobil.store');
    Route::get('/{id}', [MobilController::class, 'show'])->name('mobil.show');
    Route::post('/{id}/update', [MobilController::class, 'update'])->name('mobil.update');
    Route::post('/{id}/delete', [MobilController::class, 'destroy'])->name('mobil.delete');
});
