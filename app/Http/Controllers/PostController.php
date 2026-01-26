<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\Repost;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class PostController extends Controller
{
    public function store(StorePostRequest $request)
    {
        DB::beginTransaction();

        $post = $request->all();
        $post['user_id'] = Auth::id();

        $newPost = Post::create($post);

        DB::commit();

        return Inertia::render('Feed', [
            'data' => new JsonResponse(['post' => $newPost], 201),
        ]);
    }

    public function show($slug, $postId)
    {
        $user = User::where('slug', $slug)->first();

        $post = Post::with(['user:id,name,slug'])
            ->withCount(['likes', 'reposts'])
            ->withExists([
                'likes as liked_by_me' => fn($q) =>
                $q->where('user_id', Auth::id()),

                'reposts as reposted_by_me' => fn($q) =>
                $q->where('user_id', Auth::id()),
            ])
            ->findOrFail($postId);

        if (!$user) {
            return redirect(route('posts.show', ['slug' => $post->user->slug, 'postId' => $postId]));
        }

        return Inertia::render('Post', [
            'post' => $post
        ]);
    }

    public function toggleLike(Post $post)
    {
        $user = Auth::user();

        // toggle like
        $liked = $post->likes()
            ->where('user_id', $user->id)
            ->exists();

        if ($liked) {
            $post->likes()->detach($user->id);
        } else {
            $post->likes()->attach($user->id);
        }

        return response()->json([
            'liked' => ! $liked,
            'likes_count' => $post->likes()->count(),
        ]);
    }

    public function createRepost($postId)
    {
        DB::beginTransaction();

        $post = Post::findOrFail($postId);

        $user = User::findOrFail(Auth::id());

        $newRepost = Repost::create(['user_id' => $user->id, 'post_id' => $post->id]);

        DB::commit();

        return Inertia::render('Feed', [
            'data' => new JsonResponse(['post' => $newRepost], 201),
        ]);
    }

    public function deleteRepost($postId)
    {
        DB::beginTransaction();

        $post = Post::findOrFail($postId);

        $user = User::findOrFail(Auth::id());

        $repost = Repost::where([
            ['post_id', $post->id],
            ['user_id', $user->id]
        ])->firstOrFail();

        $repost->delete();

        DB::commit();

        return Inertia::render('Feed', [
            'data' => new JsonResponse(204),
        ]);
    }
}
