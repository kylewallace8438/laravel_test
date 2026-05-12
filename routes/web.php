<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\QrController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/storage/{path}', function ($path) {
    if (Storage::disk('public')->exists($path)) {
        return response()->file(Storage::disk('public')->path($path));
    }
    abort(404);
})->where('path', '.*')->name('storage.serve');
Route::get('qr/{uuid}', [QrController::class, 'serve'])->name('qr.serve')->middleware('throttle:3,1'); // Limit to 10 requests per minute
