<?php

namespace App\Http\Controllers\Admin\Core;

use App\Category;
use Illuminate\Http\Request;


class CategoryController extends AbstractCoreController
{
    public $title = "分类管理";
    protected $category;


    public function __construct(Category $category)
    {
        $this->category = $category;
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $list = $this->category->where('parent_id', 0)->get();
        return $this->view('basic.category.index', compact('list'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = $this->category->pluck('name', 'id');
        return $this->view('basic.category.create', compact('categories'));
    }

    public function store(Request $request)
    {
        if ($this->category->create($request->all())) {
            return $this->success();
        }
        return $this->error();
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
        $categories = $this->category->pluck('name', 'id');
        return $this->view('basic.category.edit', compact('model', 'categories'));
    }

    public function update(Request $request, $id)
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
     * @throws \Exception
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
