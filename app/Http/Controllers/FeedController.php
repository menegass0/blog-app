<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class FeedController extends Controller
{
    public function index()
    {
        return Inertia::render('Feed', [
            'posts' => Inertia::defer(fn() => Post::with([
                'user',
            ])->withCount(['likes', 'reposts'])->withExists([
                'likes as liked_by_me' => fn($q) =>
                $q->where('user_id', Auth::id()),

                'reposts as reposted_by_me' => fn($q) =>
                $q->where('user_id', Auth::id()),
            ])
                ->latest()
                ->get())
        ]);
    }
}
