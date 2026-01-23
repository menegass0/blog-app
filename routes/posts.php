<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::get('/{slug}/status/{postId}', [PostController::class, 'show'])->name('posts.show');

Route::post('/posts/{post}/like', [PostController::class, 'toggleLike'])->name('posts.like');

Route::post('/posts/{post}/repost', [PostController::class, 'createRepost'])->name('posts.create.repost');

Route::post('/posts/{post}/remove-repost', [PostController::class, 'deleteRepost'])->name('posts.remove.repost');
