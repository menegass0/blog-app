<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Index');
})->name('index');

Route::get('/feed', function () {
    return Inertia::render('Feed');
})->name('feed.index')->middleware('loggedIn');

Route::get('/teste', function () {
    return Inertia::render('Test');
})->name('teste');

require __DIR__ . '/auth/auth.php';
