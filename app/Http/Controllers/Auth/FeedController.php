<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Inertia\Inertia;

class FeedController extends Controller
{
    public function index()
    {
        // $posts = Post::select('id', 'text', 'created_at')->with('user')->orderBy('created_at', 'desc')->limit(3)->get();

        return Inertia::render('Feed', [
            'posts' => Inertia::defer(fn() => Post::with(['user' => function ($query) {
                $query->select('id', 'name');
            }])->orderBy('created_at', 'desc')->limit(10)->get()),
        ]);
    }
}
