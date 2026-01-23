<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Inertia\Inertia;

class UserController extends Controller
{
    public function show($slug)
    {
        $user = User::where('slug', $slug)->firstOrFail();

        $posts = Post::query()
            ->where('user_id', $user->id) // posts I created
            ->with([
                'user:id,name,slug',
            ])
            ->latest()
            ->paginate(15);

        return Inertia::render('Profile', [
            'user' => $user,
            'posts' => $posts,
            'total_posts' => $posts->total()
        ]);
    }
}
