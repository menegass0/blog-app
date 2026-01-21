<?php

use App\Http\Controllers\FeedController;
use App\Http\Controllers\TesteController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Index');
})->name('index');

Route::get('/feed', [FeedController::class, 'index'])->name('feed.index')->middleware('loggedIn');

Route::get('/teste', [TesteController::class, 'index'])->name('teste');

require __DIR__ . '/auth/auth.php';
require __DIR__ . '/posts.php';
require __DIR__ . '/users.php';
