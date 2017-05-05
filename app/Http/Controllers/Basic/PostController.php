<?php

namespace App\Http\Controllers\Basic;

use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostController extends AbstractBasicController
{
    public static function model()
    {
        return PostRepository::class;
    }

    public function title()
    {
        return '文章管理';
    }


}
