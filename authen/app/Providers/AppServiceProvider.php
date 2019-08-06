<?php

namespace App\Providers;

use App\Model\Admin\ConfigModel;
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

        $config[] = array();
        $config[0] = 'web_name';
        $config[1] = 'header_logo';
        $config[2] = 'footer_logo';
        $config[3] = 'intro';
        $config[4] = 'desc';

        /*
         * tạo giá trị mặc định cho mảng default
         */
        $default = array();
        foreach ($config as $item_config){
            if (!isset($default[$item_config])){
                $default[$item_config] = '';
            }
        }

        $items = ConfigModel::all();
        foreach($items as $item){
            $key = $item->name;
            $default[$key] = $item->value;
        }

        $global_settings = $default;
        $menu_items_header = MenuItemModel::getMenuItemByHeader();
        $menu_header = MenuItemModel::getMenu($menu_items_header);

        $menu_items_footer1 = MenuItemModel::getMenuItemByFooter1();
        $menu_items_footer2 = MenuItemModel::getMenuItemByFooter2();
        $menu_items_footer3 = MenuItemModel::getMenuItemByFooter3();

//        $cartTotalQuantity = \Cart::getTotalQuantity();

//        View::share('fe_cartTotalQuantity', $cartTotalQuantity);
        View::share('fe_global_settings', $global_settings);
        View::share('fe_menu_header', $menu_header);
        View::share('fe_menu_items_footer1', $menu_items_footer1);
        View::share('fe_menu_items_footer2', $menu_items_footer2);
        View::share('fe_menu_items_footer3', $menu_items_footer3);
    }
}
