<?php

namespace App\Http\Controllers\Basic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\RoleRepository;

class RoleController extends AbstractBasicController
{

    public static function model()
    {
        return RoleRepository::class;
    }


    protected function title()
    {
        return '角色管理';
    }

    protected function fields()
    {
        return [
            'name' => 'bsText',
            'description' => 'bsText'
        ];
    }

}
