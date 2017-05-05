<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
