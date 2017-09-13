<?php
/**
 * author: crisen
 * email: crisen@crisen.org
 * date: 2017/5/26 14:52
 * description:
 */

namespace App\Http\Presenters;

class MenuPresenter extends AbstractPresenter
{
    public function fillMenus($menus)
    {
        $fill = ['0' => 'root'];
        return $this->fillArray($fill, $menus);
    }

    public function fillPermissions($permissions)
    {
        $fill = ['0' => '任意'];
        return $this->fillArray($fill, $permissions);
    }
}