<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\ShopCategoryModel;
use Illuminate\Support\Facades\DB;

class ShopCategoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("auth:admin");
    }
    public function index() {
//        $items = ShopCategoryModel::all();
        $items = DB::table('shop_category')->paginate(10);
        $data = array();
        $data['cats'] = $items ;
//        echo "<pre>";
//        dump($data);
//        echo "</pre>";
        return view('admin.content.shop.category.index',$data) ;
    }
    public function create() {
        $data = array();
        return view('admin.content.shop.category.submit',$data);
    }
    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'images' => 'required',
            'intro' => 'required',
            'desc' => 'required',
        ]);
//        Để hiển thị lỗi thì phải có code show error trong file submit
        $input = $request->all();
        $item = new ShopCategoryModel();
        $item->name = $input['name'];
        $item->slug = $input['slug'];
        $item->images = $input['images'];
        $item->intro = $input['intro'];
        $item->desc = $input['desc'];
        $item->save();
        return redirect('/admin/shop/category');
    }

    public function edit($id) {
        $item = ShopCategoryModel::find($id);
        $data = array();
        $data['cat'] = $item;
        return view ('admin.content.shop.category.edit',$data);
    }
    public function update(Request $request,$id) {
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'images' => 'required',
            'intro' => 'required',
            'desc' => 'required',
        ]);
        $input = $request->all();
        $item =  ShopCategoryModel::find($id);
        $item->name = $input['name'];
        $item->slug = $input['slug'];
        $item->images = $input['images'];
        $item->intro = $input['intro'];
        $item->desc = $input['desc'];
        $item->save();
        return redirect('/admin/shop/category');
    }

    public function delete($id) {
        $item = ShopCategoryModel::find($id);
        $data = array();
        $data['cat'] = $item;
        return view ('admin.content.shop.category.delete',$data);
    }
    public function destroy($id) {
        $item = ShopCategoryModel::find($id);
        $item->delete();
        return redirect('/admin/shop/category');
    }
}
