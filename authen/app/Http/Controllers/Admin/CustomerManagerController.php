<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CustomerManagerController extends Controller
{
    //
    public function index() {
        $items = DB::table('users')->paginate(10);
        $data = array();
        $data['customers'] = $items ;
        return view('admin.content.shop.customer.index',$data) ;
    }
    public function create() {
        $data = array();
        return view('admin.content.shop.customer.submit',$data);
    }
}
