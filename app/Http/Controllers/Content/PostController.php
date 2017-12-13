<?php

namespace App\Http\Controllers\Content;

use App\Http\Requests\PostRequest;
use App\Repositories\PostRepository;

class PostController extends AbstractContentController
{

    protected $post;
    protected $title = '文章管理';


    public function __construct(PostRepository $post)
    {
        $this->post = $post;
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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $list = $this->post->all();
        return $this->view('basic.common.index', compact('list'));
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


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = $this->post->find($id);
        return $this->view('basic.common.show', compact('model'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $model = $this->post->find($id);
        return $this->view('basic.common.edit', compact('model'));
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

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $model = $this->post->find($id);
        if ($model->delete()) {
            return $this->success();
        }
        return $this->error();
    }

}
