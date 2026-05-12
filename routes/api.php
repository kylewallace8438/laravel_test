<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);



Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);

    // Route::group(['prefix' => 'bikes'], function () {
    //     Route::get('/me', [\App\Http\Controllers\BikeController::class, 'getMyBikes']);
    //     Route::post('/', [\App\Http\Controllers\BikeController::class, 'store']);
    //     Route::get('/{id}', [\App\Http\Controllers\BikeController::class, 'show']);
    //     Route::put('/{id}', [\App\Http\Controllers\BikeController::class, 'update']);
    //     Route::delete('/{id}', [\App\Http\Controllers\BikeController::class, 'destroy']);
    // });

    Route::group(['prefix' => 'history'], function () {
        Route::get('/me', [\App\Http\Controllers\ManagementHistoryController::class, 'getMyHistory']);
        Route::post('/', [\App\Http\Controllers\ManagementHistoryController::class, 'store']);
        Route::get('/{id}', [\App\Http\Controllers\ManagementHistoryController::class, 'show']);
        Route::put('/{id}', [\App\Http\Controllers\ManagementHistoryController::class, 'update']);
        Route::delete('/{id}', [\App\Http\Controllers\ManagementHistoryController::class, 'destroy']);
    });
});
