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
        return $this->hasMany(Repost::class);
    }
}
