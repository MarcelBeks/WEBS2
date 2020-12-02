<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use \App\Navigation;

class MenuComposer
{
    public $menuList = [];
    /**
     * Create a menu composer.
     *
     * @return void
     */
    public function __construct(Navigation $menu)
    {
        $this->menuList = $menu->getMenu();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('menuList', $this->menuList);
    }
}
