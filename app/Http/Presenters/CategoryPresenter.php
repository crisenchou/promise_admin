<?php
/**
 * author: crisen
 * email: crisen@crisen.org
 * date: 2017/5/26 14:52
 * description:
 */

namespace App\Http\Presenters;

class CategoryPresenter extends AbstractPresenter
{

    public function fillCategories($categories)
    {
        $fill = ['0' => '无'];
        return $this->fillArray($fill, $categories);
    }
}