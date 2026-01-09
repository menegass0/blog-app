<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/signup', [RegisterController::class, 'index'])->name('signup.index')->middleware('redirectFeed');

Route::post('/signup', [RegisterController::class, 'register'])->name('signup.store')->middleware('redirectFeed');

Route::get('/login', [LoginController::class, 'index'])->name('login.index')->middleware('redirectFeed');

Route::post('/login', [AuthController::class, 'login'])->name('login.store')->middleware('redirectFeed');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('loggedIn');
