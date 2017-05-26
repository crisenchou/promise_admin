<?php
/**
 * author: crisen
 * email: crisen@crisen.org
 * date: 2017/5/26 14:52
 * description:
 */

namespace App\Http\Presenters;

class MenuPresenter
{


    private function fillArray($fill,$array){
        if(is_array($array)){
            return array_merge($fill,$array);
        }else{
            return $fill;
        }
    }

    public function fillMenus($menus){
        $fill = ['0'=>'root'];
        return $this->fillArray($fill,$menus);
    }

    public function fillPermissions($permissions){
        $fill = ['0'=>'任意'];
        return $this->fillArray($fill,$permissions);
    }
}