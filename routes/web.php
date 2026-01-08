<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Index');
})->name('index');

Route::get('/teste', function () {
    return Inertia::render('Test');
})->name('teste');

Route::get('/signup', function () {
    return Inertia::render('Signup');
})->name('signup.index');

Route::post('/signup', function () {
    return Inertia::render('Signup');
})->name('signup.store');

Route::get('/login', function () {
    return Inertia::render('Login');
})->name('login.index');
