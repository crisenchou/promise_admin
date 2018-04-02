<?php
/**
 * Created by PhpStorm.
 * User: crisen
 * Date: 18-4-2
 * Time: 下午5:04
 */


return [
    'menus' => [
        1 => [
            'id' => 1,
            'parent_id' => 0,
            'name' => '系统',
            'url' => '#',
            'icon' => 'fa-desktop',
            'target' => '_self',
            'status' => 1
        ],
        2 => [
            'id' => 2,
            'parent_id' => 1,
            'name' => '用户',
            'url' => 'user',
            'icon' => 'fa-users',
            'target' => '_self',
            'status' => 1
        ],
        3 => [
            'id' => 3,
            'parent_id' => 1,
            'name' => '角色',
            'url' => 'role',
            'icon' => 'fa-users',
            'target' => '_self',
            'status' => 1
        ],
        5 => [
            'id' => 5,
            'parent_id' => 1,
            'name' => '权限',
            'url' => 'permission',
            'icon' => 'fa-pencil-square-o',
            'target' => '_self',
            'status' => 1
        ],
        6 => [
            'id' => 6,
            'parent_id' => 1,
            'name' => '菜单',
            'url' => 'menu',
            'icon' => 'fa-list',
            'target' => '_self',
            'status' => 1
        ],
        7 => [
            'id' => 7,
            'parent_id' => 0,
            'name' => '基础',
            'url' => '#',
            'icon' => 'fa-list',
            'target' => '_self',
            'status' => 1
        ],
        8 => [
            'id' => 8,
            'parent_id' => 7,
            'name' => '分类',
            'url' => 'category',
            'icon' => 'fa-list',
            'target' => '_self',
            'status' => 1
        ],
        9 => [
            'id' => 9,
            'parent_id' => 7,
            'name' => '文章',
            'url' => 'post',
            'icon' => 'fa-list',
            'target' => '_self',
            'status' => 1
        ],
    ]


];