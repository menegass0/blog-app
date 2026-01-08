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
})->name('signup');

Route::post('/signup', function () {
    dd('aaaaaaaa');

    return Inertia::render('Signup');
})->name('signup.store');
