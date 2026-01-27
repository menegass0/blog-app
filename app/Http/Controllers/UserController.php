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

        $postsQuery = Post::query()
            ->where('user_id', $user->id)
            ->selectRaw("
            posts.id as feed_id,
            posts.id as post_id,
            posts.user_id as actor_id,
            posts.created_at as feed_created_at,
            'post' as feed_type
        ");

        $repostsQuery = Repost::query()
            ->where('user_id', $user->id)
            ->selectRaw("
                reposts.id as feed_id,
                reposts.post_id as post_id,
                reposts.user_id as actor_id,
                reposts.created_at as feed_created_at,
                'repost' as feed_type
            ");

        $feed = $postsQuery
            ->unionAll($repostsQuery)
            ->orderBy('feed_created_at', 'desc')
            ->paginate(10);

        $postIds = $feed->pluck('post_id')->unique();
        $actorIds = $feed->pluck('actor_id')->unique();

        $posts = Post::whereIn('id', $postIds)
            ->with(['user:id,name,slug'])
            ->withCount(['likes', 'reposts'])
            ->withExists([
                'likes as liked_by_me' => fn($q) =>
                $q->where('user_id', Auth::id()),
                'reposts as reposted_by_me' => fn($q) =>
                $q->where('user_id', Auth::id()),
            ])
            ->get()
            ->keyBy('id');

        $actors = User::whereIn('id', $actorIds)
            ->select('id', 'name', 'slug')
            ->get()
            ->keyBy('id');


        $feed->getCollection()->transform(function ($item) use ($posts, $actors) {
            $item->post = $posts[$item->post_id] ?? null;
            $item->actor = $actors[$item->actor_id] ?? null;
            return $item;
        });

        return Inertia::render('Profile', [
            'user' => $user,
            'posts' => $feed,
            'total_posts' => $feed->total()
        ]);
    }
}
