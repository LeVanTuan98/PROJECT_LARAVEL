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
        return view('admin.content.shop.category.index',$data) ;
    }
    public function create() {
        $data = array();
        return view('admin.content.shop.category.submit',$data);
    }
    public function slugify($str){
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ã|ả|â|ầ|ấ|ậ|ẫ|ẩ|ă|ằ|ắ|ẵ|ặ|ẳ)/','a',$str);
        $str = preg_replace('/(è|é|ẹ|ẽ|ẻ|ê|ề|ế|ể|ễ|ệ)/','e',$str);
        $str = preg_replace('/(ì|í|ĩ|ỉ|ị)/','i',$str);
        $str = preg_replace('/(ò|ó|ỏ|õ|ọ|ô|ồ|ố|ổ|ỗ|ộ|ơ|ờ|ớ|ở|ỡ|ỡ)/','o',$str);
        $str = preg_replace('/(ú|ù|ũ|ủ|ụ|ư|ứ|ừ|ử|ữ|ự)/','u',$str);
        $str = preg_replace('/(ý|ỳ|ỷ|ỹ|ỵ)/','y',$str);
        $str = preg_replace('/(đ)/','d',$str);
        $str = preg_replace('/[^a-z0-9-\s]/','',$str);
        $str = preg_replace('/([\s]+)/','-',$str);
        return $str;
    }
    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
            'images' => 'required',
        ]);
//        Để hiển thị lỗi thì phải có code show error trong file submit
        $input = $request->all();
        $item = new ShopCategoryModel();
        $item->name = $input['name'];
        $item->slug = $input['slug'] ? $this->slugify($input['slug']) : $this->slugify($input['name']);
        $item->images = $input['images'];
        $item->intro = isset($input['intro']) ? $input['intro'] : '';
        $item->desc = isset($input['desc']) ? $input['desc'] : '';
        $item->homepage = isset($input['homepage']) ? (int)$input['homepage'] : 0;
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
            'images' => 'required',
        ]);
        $input = $request->all();
        $item =  ShopCategoryModel::find($id);
        $item->name = $input['name'];
        $item->slug = $input['slug'] ? $this->slugify($input['slug']) : $this->slugify($input['name']);
        $item->images = $input['images'];
        $item->intro = isset($input['intro']) ? $input['intro'] : '';
        $item->desc = isset($input['desc']) ? $input['desc'] : '';
        $item->homepage = isset($input['homepage']) ? (int)$input['homepage'] : 0;
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
