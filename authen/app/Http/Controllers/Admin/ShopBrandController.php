<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ShopBrandController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("auth:admin");
    }
    public function index() {
        $items = DB::table('shop_brands')->paginate(10);
        $data = array();
        $data['brands'] = $items ;
        return view('admin.content.shop.brand.index',$data) ;
    }
}
