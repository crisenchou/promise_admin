<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    public $primaryKey = 'user_id';
    public $fillable = ['birthday', 'age', 'gender', 'avatar'];
}
