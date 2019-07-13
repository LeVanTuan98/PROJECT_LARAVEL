<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\ConfigModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    //
    public function index(){
        $items = ConfigModel::all();
        $data = array();
        $data['configs'] =$items;
        return view('admin.content.config.index',$data);
    }
    public function store() {

    }
}
