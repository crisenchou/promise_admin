<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Post
 *
 * @property-read \App\User $user
 * @mixin \Eloquent
 */
class Post extends Model
{
    public $fillable = [
        'title', 'user_id', 'summary', 'cover', 'content'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
