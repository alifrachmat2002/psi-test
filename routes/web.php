<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DASS21Controller;
use App\Http\Controllers\GHQController;
use App\Http\Controllers\HSCL25Controller;
use App\Http\Controllers\HTQController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\TestController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware(['auth','verified'])->group(function () {
Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/test-ghq',[GHQController::class,'create'])->name('test-ghq');
    Route::post('/test-ghq',[GHQController::class,'store'])->name('test-ghq.submit');

    Route::get('/test-dass21',[DASS21Controller::class,'create'])->name('test-dass21');
    Route::post('/test-dass21',[DASS21Controller::class,'store'])->name('test-dass21.submit');

    Route::get('/test-hscl25',[HSCL25Controller::class,'create'])->name('test-hscl25');
    Route::post('/test-hscl25',[HSCL25Controller::class,'store'])->name('test-hscl25.submit');

    Route::get('/test-htq',[HTQController::class,'create'])->name('test-htq');
    Route::post('/test-htq',[HTQController::class,'store'])->name('test-htq.submit');

    Route::get('/test-finished/{hasil}',[TestController::class,'testFinished'])->name('test-finished');
    Route::get('/resume-test',[TestController::class,'resumeTest'])->name('resume-test');
});

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/authenticate',[AuthController::class, 'authenticate'])->name('authenticate');

