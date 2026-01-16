<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoginRequest;
use App\Models\Post;
use App\Services\AuthService;
use Inertia\Inertia;

class FeedController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user' => function ($query) {
            $query->select('id', 'name');
        }])->orderBy('created_at', 'asc')->limit(3)->get();

        // $posts = Post::select('id', 'text', 'created_at')->with('user')->orderBy('created_at', 'desc')->limit(3)->get();

        return Inertia::render('Feed', compact('posts'));
    }
}
