<?php
/**
 * author: crisen
 * email: crisen@crisen.org
 * date: 2017/4/14 16:14
 * description:
 */
namespace App\Http\ViewComposers;

use App\Repositories\MenuRepository;
use Illuminate\View\View;

class MenuComposer
{

    protected $menus;

    public function __construct(MenuRepository $model)
    {
        $menus = $model->parent()->all();

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