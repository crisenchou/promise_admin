<?php
/**
 * Created by PhpStorm.
 * User: crisen
 * Date: 18-4-2
 * Time: 下午4:49
 */


if (!function_exists('getTree')) {
    function getTree($items, $pid = 'pid', $son = 'son')
    {
        $tree = [];
        foreach ($items as $item) {
            if (isset($items[$item[$pid]]))
                $items[$item[$pid]][$son][] = &$items[$item['id']];
            else
                $tree[] = &$items[$item['id']];
        }
        return $tree;
    }
}