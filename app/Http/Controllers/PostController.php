<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\JsonResponse;
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

        $post = Post::with('user')->findOrFail($postId);

        if (!$user) {
            return redirect(route('posts.show', ['slug' => $post->user->slug, 'postId' => $postId]));
        }

        return Inertia::render('Post', [
            'post' => $post
        ]);
    }

    public function like($postId)
    {
        $user = User::findOrFail(Auth::id());
    }
}
