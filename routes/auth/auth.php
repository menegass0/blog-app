<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

Route::get('/signup', [RegisterController::class, 'index'])->name('signup.index');

Route::post('/signup', [RegisterController::class, 'register'])->name('signup.store');

Route::get('/login', [AuthController::class, 'LoginIndex'])->name('login.index');
