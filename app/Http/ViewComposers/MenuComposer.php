<?php
/**
 * author: crisen
 * email: crisen@crisen.org
 * date: 2017/4/14 16:14
 * description:
 */
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Menu;

class MenuComposer
{

    protected $menu;

    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $menus = Menu::get();
        $view->with('menusTree', $menus);
    }
}