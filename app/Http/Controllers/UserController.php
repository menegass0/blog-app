<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Repost;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserController extends Controller
{
    public function show($slug)
    {
        $user = User::where('slug', $slug)->firstOrFail();

        $feed = Post::query()
            ->where(function ($q) use ($user) {
                $q->where('user_id', $user->id) // my own posts
                    ->orWhereHas(
                        'reposts',
                        fn($rq) =>
                        $rq->where('user_id', $user->id) // posts I reposted
                    );
            })
            ->with([
                'user:id,name,slug',
                'reposts' => fn($q) =>
                $q->where('user_id', $user->id)->select('id', 'user_id', 'post_id', 'created_at'),
            ])
            ->withCount([
                'likes as likes',
                'reposts as reposts',
            ])
            ->withExists([
                'likes as liked_by_me' => fn($q) =>
                $q->where('user_id', Auth::id()),

                'reposts as reposted_by_me' => fn($q) =>
                $q->where('user_id', Auth::id()),
            ])
            ->orderByRaw('
                COALESCE(
                    (select created_at from reposts where reposts.post_id = posts.id and reposts.user_id = ? limit 1),
                    posts.created_at
                ) desc
            ', [$user->id])

            ->paginate(6);

        return Inertia::render('Profile', [
            'user' => $user,
            'posts' => $feed,
            'total_posts' => $feed->total()
        ]);
    }
}
