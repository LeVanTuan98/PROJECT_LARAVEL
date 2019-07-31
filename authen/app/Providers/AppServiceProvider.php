<?php

namespace App\Providers;

use App\Model\Admin\MenuItemModel;
use App\Model\Admin\MenuModel;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        $menu_items_header = MenuItemModel::getMenuItemByHeader();
        $menu_header = MenuItemModel::getMenu($menu_items_header);

        $menu_items_footer1 = MenuItemModel::getMenuItemByFooter1();
        $menu_items_footer2 = MenuItemModel::getMenuItemByFooter2();
        $menu_items_footer3 = MenuItemModel::getMenuItemByFooter3();

        View::share('fe_menu_header', $menu_header);
        View::share('fe_menu_items_footer1', $menu_items_footer1);
        View::share('fe_menu_items_footer2', $menu_items_footer2);
        View::share('fe_menu_items_footer3', $menu_items_footer3);
    }
}
