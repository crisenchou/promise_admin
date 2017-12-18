<?php

namespace App\Http\Controllers\Content;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends AbstractContentController
{
    public $title = "分类管理";
    protected $category;


    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function fields()
    {
        return [
            'name' => 'bsText',
            'parent_id' => 'bsText'
        ];
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $list = $this->category->findAllBy('parent_id', 0);
        return $this->view('basic.category.index', compact('list'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = $this->createMap($this->category->all());
        return $this->view('basic.category.create', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        if ($this->category->create($request->all())) {
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
        $model = $this->category->find($id);
        return $this->view('basic.category.show', compact('model'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $model = $this->category->find($id);
        $categories = $this->createMap($this->category->all());
        return $this->view('basic.category.edit', compact('model', 'categories'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $model = $this->category->find($id);
        $fill = $request->except(['_token']);
        if ($model->update($fill)) {
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
        $model = $this->category->find($id);
        if ($model->delete()) {
            return $this->success();
        }
        return $this->error();
    }
}
