<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MenuModel extends Model
{
    //
    public $table = "menus";

    public static function getMenuLocations() {
        $locations = array();
        $locations[1] = "Header Location";
        $locations[2] = "Footer Location 1";
        $locations[3] = "Footer Location 2";
        $locations[4] = "Footer Location 3";

        return $locations;
    }

}
