<?php

namespace App\Http\Controllers\Basic;

use App\Http\Requests\PostRequest;
use App\Post;

class PostController extends AbstractBasicController
{

    protected $post;
    protected $title = '文章管理';


    public function __construct(Post $post)
    {
        $this->post = $post;
    }



    public function index()
    {
        $list = $this->post->all();
        return $this->view('basic.post.index', compact('list'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return $this->view('common.create');
    }

    public function store(PostRequest $request)
    {
        $fill = $request->except(['_token', 'cover']);
        if ($request->hasFile('cover')) {
            $path = $request->cover->store('images');
            $fill['cover'] = $path;
        }
        if ($this->post->create($fill)) {
            return $this->success();
        }
        return $this->error();
    }



    public function show($id)
    {
        $model = $this->post->find($id);
        return $this->view('basic.post.show', compact('model'));
    }



    public function edit($id)
    {
        $model = $this->post->find($id);
        return $this->view('basic.post.edit', compact('model'));
    }

    public function update(PostRequest $request, $id)
    {
        $post = $this->post->find($id);
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


    public function destroy($id)
    {
        $model = $this->post->find($id);
        if ($model->delete()) {
            return $this->success();
        }
        return $this->error();
    }

}
