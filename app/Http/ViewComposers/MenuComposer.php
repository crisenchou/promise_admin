<?php
/**
 * author: crisen
 * email: crisen@crisen.org
 * date: 2017/4/14 16:14
 * description:
 */
namespace App\Http\ViewComposers;

use App\Repositories\Criteria\MainMenu;
use App\Repositories\Criteria\Submenu;
use App\Repositories\MenuRepository;
use Illuminate\View\View;
use App\Menu;

class MenuComposer
{

    protected $menus;

    public function __construct(MenuRepository $menu)
    {
//        $menu->pushCriteria(new MainMenu());
//        $menu->pushCriteria(new Submenu());

        $menus = $menu->findAllBy('parent_id', 0);
        //$menus = $menu->all();
        $this->menus = $menus;
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('menusTree', $this->menus);
    }
}