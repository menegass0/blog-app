<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Repost extends Model
{
    protected $fillable = ['user_id', 'post_id', 'text'];

    public function originalPost()
    {
        return $this->belongsToMany(
            Post::class,
            'reposts',
            'repost_post_id',
            'original_post_id'
        )
            ->withPivot('text')
            ->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
