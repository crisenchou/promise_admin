<?php

namespace App\Repositories;

use App\Menu;
use Crisen\Repositories\Eloquent\Repository;

class MenuRepository extends Repository
{
    public function model()
    {
        return Menu::class;
    }
}