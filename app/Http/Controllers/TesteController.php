<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TesteController extends Controller
{
    public function index()
    {
        dd(request()->isSecure());

        // $myPosts = DB::table('posts')
        //     ->where('user_id', $userId)
        //     ->select([
        //         'id as item_id',
        //         DB::raw("'post' as type"),
        //         'content as text',
        //         DB::raw('NULL as repost_text'),
        //         'created_at'
        //     ]);

        // /**
        //  * My reposts
        //  */
        // $myReposts = DB::table('reposts')
        //     ->join('posts', 'posts.id', '=', 'reposts.post_id')
        //     ->where('reposts.user_id', $userId)
        //     ->select([
        //         'posts.id as item_id',
        //         DB::raw("'repost' as type"),
        //         'posts.content as text',
        //         'reposts.text as repost_text',
        //         'reposts.created_at'
        //     ]);

        // /**
        //  * Unified timeline
        //  */
        // $timeline = $myPosts
        //     ->unionAll($myReposts)
        //     ->orderBy('created_at', 'desc')
        //     ->paginate(10);
    }
}
