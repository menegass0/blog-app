<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'text',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reposts()
    {
        return $this->belongsToMany(Post::class, 'reposts', 'original_post_id', 'repost_post_id')->withTimestamps();
    }

    public function originalPost()
    {
        return $this->belongsToMany(
            Post::class,
            'reposts',
            'repost_post_id',
            'original_post_id'
        )
            ->withTimestamps();
    }

    public function repostedBy()
    {
        return $this->hasOne(Repost::class, 'repost_post_id');
    }


    public function likes()
    {
        return $this->belongsToMany(
            User::class,
            'likes'
        )->withTimestamps();
    }

    public function likesCount(): int
    {
        return $this->likes()->count();
    }

    public function isLikedBy(User $user): bool
    {
        return $this->likes()
            ->where('user_id', $user->id)
            ->exists();
    }
}
