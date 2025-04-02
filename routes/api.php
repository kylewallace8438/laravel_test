<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::get('/accounts', [AccountController::class, 'list']);
Route::post('/account', [AccountController::class, 'store']);
Route::get('/accounts/{registerID}', [AccountController::class, 'get']);
Route::put('/accounts/{registerID}', [AccountController::class, 'update']);
Route::delete('/accounts/{registerID}', [AccountController::class, 'destroy']);
