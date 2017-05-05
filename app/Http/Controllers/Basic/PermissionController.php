<?php

namespace App\Http\Controllers\Basic;

use App\Repositories\PermissionRepository;
use Illuminate\Http\Request;

class PermissionController extends AbstractBasicController
{
    public static function model()
    {
        return PermissionRepository::class;
    }

    public function title()
    {
        return '权限管理';
    }


    public function fields()
    {
        return [
            'name' => 'bsText',
            'description' => 'bsText',
        ];
    }

}
