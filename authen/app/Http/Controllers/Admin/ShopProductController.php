<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\ShopProductModel;
use App\Model\Admin\ShopCategoryModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ShopProductController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("auth:admin");
    }
    public function index() {
        $items = DB::table('shop_products')->paginate(10);
        $data = array();
        $data['products'] = $items ;
        return view('admin.content.shop.product.index',$data) ;
    }
    public function create() {
        $cats = ShopCategoryModel::all();
        $data = array();
        $data['cats'] = $cats;
        return view('admin.content.shop.product.submit',$data);
    }
    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'images' => 'required',
            'intro' => 'required',
            'desc' => 'required',
            'priceCore' => 'required|numeric',
            'priceSale' => 'required|numeric',
            'stock' => 'required|numeric',
            'cat_id' => 'required',
        ]);




//        Để hiển thị lỗi thì phải có code show error trong file submit
        $input = $request->all();
        $item = new ShopProductModel();
        $item->name = $input['name'];
        $item->slug = $input['slug'];
        $item->images = isset($input['images']) ? json_encode($input['images']) : '';
        $item->intro = $input['intro'];
        $item->desc = $input['desc'];
        $item->priceCore = $input['priceCore'];
        $item->priceSale = $input['priceSale'];
        $item->stock = $input['stock'];
        $item->cat_id = $input['cat_id'];
        $item->save();
        return redirect('/admin/shop/product');
    }
    public function edit($id) {
        $item = ShopProductModel::find($id);
        $cats = ShopCategoryModel::all();
        $data = array();
        $data['cats'] = $cats;
        $data['product'] = $item;
        return view ('admin.content.shop.product.edit',$data);
    }
    public function update(Request $request,$id) {
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'images' => 'required',
            'intro' => 'required',
            'desc' => 'required',
            'priceCore' => 'required|numeric',
            'priceSale' => 'required|numeric',
            'stock' => 'required|numeric',
            'cat_id' => 'required',
        ]);
//        Để hiển thị lỗi thì phải có code show error trong file submit
        $input = $request->all();
        $item = ShopProductModel::find($id);
        $item->name = $input['name'];
        $item->slug = $input['slug'];
        $item->images = isset($input['images']) ? json_encode($input['images']) : '';
        $item->intro = $input['intro'];
        $item->desc = $input['desc'];
        $item->priceCore = $input['priceCore'];
        $item->priceSale = $input['priceSale'];
        $item->stock = $input['stock'];
        $item->cat_id = $input['cat_id'];
        $item->save();
        return redirect('/admin/shop/product');
    }
    public function delete($id) {
        $item = ShopProductModel::find($id);
        $data = array();
        $data['product'] = $item;
        return view ('admin.content.shop.product.delete',$data);
    }
    public function destroy($id) {
        $item = ShopProductModel::find($id);
        $item->delete();
        return redirect('/admin/shop/product');
    }
}
