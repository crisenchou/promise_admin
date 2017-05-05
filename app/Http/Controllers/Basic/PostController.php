<?php

namespace App\Http\Controllers\Basic;

use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use Auth;

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


    public function fields()
    {
        return [
            'title' => 'bsText',
            'summary' => 'bsText',
            'cover' => 'bsImage',
            'content' => 'bsTextarea'
        ];
    }

    public function upload()
    {
        return true;
    }

    public function store(Request $request)
    {
        $fill = $request->except(['_token', 'cover']);
        $fill['user_id'] = Auth::user()->id;
        if ($request->hasFile('cover')) {
            $path = $request->cover->store('images');
            $fill['cover'] = $path;
        }
        if ($this->model->create($fill)) {
            return $this->success();
        }
        return $this->error();
    }

    public function update(Request $request, $id)
    {
        $post = $this->model->find($id);
        $fill = $request->except(['_token', 'cover']);
        if ($request->hasFile('cover')) {
            $path = $request->cover->store('images');
            $fill['cover'] = $path;
        }
        if ($post->update($fill)) {
            return $this->success();
        }
        return $this->error();
    }

}
