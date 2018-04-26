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

if (!function_exists('setting')) {
    function setting($key)
    {
        return config('setting.' . $key);
    }
}


if (!function_exists('environment')) {
    function environment($environment)
    {
        return app()->environment == $environment;
    }
}


if (!function_exists('modifyEnv')) {
    function modifyEnv(array $data)
    {
        $envPath = base_path() . DIRECTORY_SEPARATOR . '.env';

        $contentArray = collect(file($envPath, FILE_IGNORE_NEW_LINES));

        $contentArray->transform(function ($item) use ($data) {
            foreach ($data as $key => $value) {
                if (str_contains($item, $key)) {
                    return $key . '=' . $value;
                }
            }

            return $item;
        });

        $content = implode($contentArray->toArray(), "\n");

        \File::put($envPath, $content);
    }
}
