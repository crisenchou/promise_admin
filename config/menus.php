<?php

return [
    1 => [
        'id' => 1,
        'parent_id' => 0,
        'name' => '基础',
        'url' => '#',
        'icon' => 'fa-desktop',
        'target' => '_self',
        'status' => 1
    ],
    2 => [
        'id' => 2,
        'parent_id' => 1,
        'name' => '用户管理',
        'url' => 'user',
        'icon' => 'fa-users',
        'target' => '_self',
        'status' => 1
    ],
    3 => [
        'id' => 3,
        'parent_id' => 1,
        'name' => '角色管理',
        'url' => 'role',
        'icon' => 'fa-users',
        'target' => '_self',
        'status' => 1
    ],
    4 => [
        'id' => 4,
        'parent_id' => 1,
        'name' => '权限管理',
        'url' => 'permission',
        'icon' => 'fa-pencil-square-o',
        'target' => '_self',
        'status' => 1
    ],
    5 => [
        'id' => 5,
        'parent_id' => 1,
        'name' => '菜单管理',
        'url' => 'menu',
        'icon' => 'fa-list',
        'target' => '_self',
        'status' => 1
    ],
];