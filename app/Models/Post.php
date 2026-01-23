<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id', 'text', 'quote_post_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Quote relationships
    public function quotedPost()
    {
        return $this->belongsTo(Post::class, 'quote_post_id');
    }

    public function quotes()
    {
        return $this->hasMany(Post::class, 'quote_post_id');
    }

    // Normal reposts
    public function reposts()
    {
        return $this->hasMany(Repost::class);
    }

    public function isQuote(): bool
    {
        return ! is_null($this->quote_post_id);
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
