<?php
/**
 * author: crisen
 * email: crisen@crisen.org
 * date: 2017/4/14 16:14
 * description:
 */
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Auth;

class NavbarComposer
{

    protected $users;


    public function __construct()
    {
        $this->user = Auth::user();
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('user', $this->user);
    }
}