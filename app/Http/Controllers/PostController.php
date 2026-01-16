<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
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
}
