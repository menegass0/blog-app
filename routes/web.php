<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Index');
})->name('index');

Route::get('/teste', function () {
    return Inertia::render('Test');
})->name('teste');

require __DIR__ . '/auth/auth.php';
