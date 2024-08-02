<?php

use App\Http\Controllers\QRCodeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/qrcode', function () {
        return view('qrcode.index', [
            'user' => auth()->user()
        ]);
    })->name('qrcode');
});

Route::get('/validate-qrcode', [QRCodeController::class,'validate'])->name('qrcode.validate');
