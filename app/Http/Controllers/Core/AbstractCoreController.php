<?php

namespace App\Http\Controllers\Core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

class AbstractCoreController extends Controller
{
    /**
     * create the mapArr
     * @param $collection
     * @return mixed
     */
    protected function createMap(Collection $collection)
    {
        $flattened = $collection->mapWithKeys(function ($values) {
            return [$values->id => $values->name];
        });
        return $flattened->all();
    }
}
