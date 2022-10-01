<?php

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

Route::group(['prefix' => 'vehicle'], function () {
    Route::get('/', [VehicleController::class, 'index'])->name('vehicle.index');
    Route::post('/add', [VehicleController::class, 'store'])->name('vehicle.store');
    Route::get('/{id}', [VehicleController::class, 'show'])->name('vehicle.show');
    Route::post('/{id}/update', [VehicleController::class, 'update'])->name('vehicle.update');
    Route::post('/{id}/delete', [VehicleController::class, 'destroy'])->name('vehicle.delete');
});
