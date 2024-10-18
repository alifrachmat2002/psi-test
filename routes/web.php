<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GHQController;
use App\Http\Controllers\TestFinishedController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/test-ghq',[GHQController::class,'create'])->name('test-ghq');
    Route::post('/test-ghq',[GHQController::class,'store'])->name('test-ghq.submit');

    Route::get('/test-finished/{hasil}',[TestFinishedController::class,'testFinished'])->name('test-finished');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/authenticate',[AuthController::class, 'authenticate'])->name('authenticate');

