<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MenuItemModel extends Model
{
    //
    public $table = "menu_items";
    public static function OutputLevelCategories($input_category,&$output_category,$parent_id = 0, $level = 1){
        if (count($input_category) > 0) {
            foreach ($input_category as $category){
                $category = (array)$category;
                if ($category['parent_id'] == $parent_id){
                    $category['level'] = $level;
                    $output_category[] = $category;

                    $new_parent_id = $category['id'];
                    $new_level = $level + 1;
                    self::OutputLevelCategories($input_category,$output_category,$new_parent_id,$new_level);
                }
            }
        }
    }
    /*
     * Để loại bỏ trường hợp menu item chọn chính nó, chọn con, cháu làm cha thì phải ngắt hết các TH đó đi
     * TH mà id trong mảng bằng với id của
     */

    public static function OutputLevelCategoriesExcept($input_category,&$output_category,$parent_id = 0, $level = 1,$except){
        if (count($input_category) > 0) {
            foreach ($input_category as $category){
                if ($category['parent_id'] == $parent_id){
                    $category['level'] = $level;
                    if($category['id'] != $except){
                        $output_category[] = (array)$category;
                    }

                    if($category['id'] != $except){
                        $new_parent_id = $category['id'];
                        $new_level = $level + 1;
                        self::OutputLevelCategoriesExcept($input_category,$output_category,$new_parent_id,$new_level,$except);
                    }
                }
            }
        }
    }
    public static function getMenuItemRecusiveExcept($except) {

        $source = MenuItemModel::all()->toArray();
        $result = array();
        self::OutputLevelCategoriesExcept($source,$result,0,1,$except);
        return $result;

    }

    public static function getMenuItemRecusive() {

        $source = MenuItemModel::all()->toArray();
        $result = array();
        self::OutputLevelCategories($source,$result);
        return $result;

    }

    public static function getTypeOfMenuItem() {
        $types = array();

        $types[1] = 'Shop Category';
        $types[2] = 'Shop Product';
        $types[3] = 'Content Category';
        $types[4] = 'Content Post';
        $types[5] = 'Content Page';
        $types[6] = 'Content Tag';
        $types[7] = 'Custom Link';

        return $types;
    }


    public static function getMenuItemByHeader() {
        $menu_header = DB::table('menus')->where('location', 1)->first();
        $result = array();
        if(isset($menu_header->id)){
            $menu_items_header = DB::table('menu_items')->where('menu_id', $menu_header->id)->orderBy('sort','ASC')->get()->toArray();
            self::OutputLevelCategories($menu_items_header,$result);
        }

        return $result;
    }

    public static function getMenuItemByFooter1() {
        $menu_footer1 = DB::table('menus')->where('location', 2)->first();
        $result = array();
        if(isset($menu_footer1->id)){
            $menu_items_footer1 = DB::table('menu_items')->where('menu_id', $menu_footer1->id)->get();
            self::OutputLevelCategories($menu_items_footer1,$result);
        }

        return $result;
    }

    public static function getMenuItemByFooter2() {
        $menu_footer2 = DB::table('menus')->where('location', 3)->first();
        $result = array();
        if (isset($menu_footer2->id)){
            $menu_items_footer2 = DB::table('menu_items')->where('menu_id', $menu_footer2->id)->get();
            self::OutputLevelCategories($menu_items_footer2,$result);
        }

        return $result;
    }

    public static function getMenuItemByFooter3() {
        $menu_footer3 = DB::table('menus')->where('location', 4)->first();
        $result = array();
        if(isset($menu_footer3->id)){
            $menu_items_footer3 = DB::table('menu_items')->where('menu_id', $menu_footer3->id)->get();
            self::OutputLevelCategories($menu_items_footer3,$result);
        }

        return $result;
    }


    public static function BuildMenuHTML($input_category,&$html,$parent_id = 0, $level = 1){
        if (count($input_category) > 0) {
            if($level == 1){
                $html .= "<ul class='nav navbar-nav '>";
            }else if($level == 2){
                $html .= "<ul class=\"dropdown-menu multi\">
                                <div class=\"row\">
                                    <div class=\"col-sm-4\">
                                        <ul class=\"multi-column-dropdown\">";
            }else{
                // Chỉ hiện thị 2 cấp nên từ cấp thứ 3 sẽ không hiển thị nữa
            }
            foreach ($input_category as $category){
                if ($category['parent_id'] == $parent_id){
                    $category['level'] = $level;
                    if($level == 1){
                        $li_class = (isset($category['total']) && $category['total'] > 0) ? 'dropdown' : '';
                        $li_icon = (isset($category['total']) && $category['total'] > 0) ? '<b class="caret"></b>' : '';

                        $html .= "<li class='".$li_class."'><a href=\"about.html\" class=\"hyper\"><span>";
                        $html .= $category['name'].$li_icon;
                    } elseif ($level == 2){
                        $html .= "<li><a href=\"jewellery.html\"><i class=\"fa fa-angle-right\" aria-hidden=\"true\"></i>";
                        $html .= $category['name'];
                    }else{

                    }


                    $new_parent_id = $category['id'];
                    $new_level = $level + 1;
                    self::BuildMenuHTML($input_category,$html,$new_parent_id,$new_level);

                    if($level == 1){
                        $html .= "</span></a></li>";
                    } elseif ($level == 2){
                        $html .= "</a></li>";
                    }else{

                    }
                }
            }
            if($level == 1){
                $html .= "</ul>";
            }else if($level == 2){
                $html .= "</ul>
                    </div>
                    <div class=\"clearfix\"></div>
                </div>
            </ul>";
            }else{
                // Chỉ hiện thị 2 cấp nên từ cấp thứ 3 sẽ không hiển thị nữa
            }
        }
    }
    public static function getMenu($source) {
        $html_menu = '';
        self::BuildMenuHTML($source,$html_menu);
        return $html_menu;
    }

}
