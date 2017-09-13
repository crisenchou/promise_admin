<?php
/**
 * author: crisen
 * email: crisen@crisen.org
 * date: 2017/5/26 14:52
 * description:
 */

namespace App\Http\Presenters;

abstract class AbstractPresenter
{
    protected function fillArray($fill, $array)
    {
        if (is_array($array)) {
            return array_merge($fill, $array);
        } else {
            return $fill;
        }
    }
}