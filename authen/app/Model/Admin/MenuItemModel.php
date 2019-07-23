<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class MenuItemModel extends Model
{
    //
    public $table = "menu_items";
    public static function OutputLevelCategories($input_category,&$output_category,$parent_id = -1, $level = 0){
        if (count($input_category) > 0) {
            foreach ($input_category as $category){
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
}
