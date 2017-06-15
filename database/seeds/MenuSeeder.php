<?php

use Illuminate\Database\Seeder;
use App\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('menus')->truncate();
        $menus = config('menus');
        Menu::insert($menus);
    }
}