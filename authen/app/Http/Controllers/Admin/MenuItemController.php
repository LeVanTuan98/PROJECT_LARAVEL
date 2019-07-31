<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\ContentCategoryModel;
use App\Model\Admin\ContentPageModel;
use App\Model\Admin\ContentPostModel;
use App\Model\Admin\ContentTagModel;
use App\Model\Admin\MenuItemModel;
use App\Model\Admin\MenuModel;
use App\Model\Admin\ShopCategoryModel;
use App\Model\Admin\ShopProductModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MenuItemController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("auth:admin");
    }
    public function index() {
//        $items = DB::table('menu_items')->paginate(10);

        $items = MenuItemModel::getMenuItemRecusive();

        $data = array();
        $data['menu_items'] = $items ;
        return view('admin.content.menu.menuitems.index',$data) ;
    }
    public function create() {
        $data = array();
        $data['types'] = MenuItemModel::getTypeOfMenuItem();
        $data['menus'] = MenuModel::all();
        $data['menuitems'] = MenuItemModel::getMenuItemRecusive();

        $data['shop_categories'] = ShopCategoryModel::all();
        $data['shop_products'] = ShopProductModel::all();
        $data['content_categories'] = ContentCategoryModel::all();
        $data['content_tags'] = ContentTagModel::all();
        $data['content_pages'] = ContentPageModel::all();
        $data['content_posts'] = ContentPostModel::all();

        return view('admin.content.menu.menuitems.submit',$data);
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
            'type' => 'required',
            'desc' => 'required',
            'menu_id' => 'required',
        ]);
//        Để hiển thị lỗi thì phải có code show error trong file submit
        $input = $request->all();
        $item = new MenuItemModel();

        $params = array();
        $types = MenuItemModel::getTypeOfMenuItem();
        foreach ($types as $type_key => $type){
            $params['params_'.$type_key] = isset($input['params_'.$type_key]) ? $input['params_'.$type_key] : '';
        }
        $params_json = json_encode($params);

        $item->name = $input['name'];
        $item->sort = isset($input['sort']) ? (int)$input['sort'] : 0;
        $item->type = $input['type'];
        $item->desc = $input['desc'];
        $item->menu_id = $input['menu_id'];
        $item->params = $params_json;
        $item->link = isset($input['link']) ? $input['link'] : '';
        $item->icon = isset($input['icon']) ? $input['icon'] : '';
        $item->parent_id = isset($input['parent_id']) ? $input['parent_id'] : 0;
        $item->save();

        if ($item->parent_id > 0){
        /*
         * Đếm tổng số menu_item có cha là $item->parent_id
         */
            $total = DB::table('menu_items')->where('parent_id', $item->parent_id)->count();


        /*
         * Cập nhật tổng số bản ghi con cho menu_item cha
         */
            $parent = MenuItemModel::find($item->parent_id);
            $parent->total = (int)$total;
            $parent->save();
        }


        return redirect('/admin/menuitems');
    }
    public function edit($id) {
        $item = MenuItemModel::find($id);
        $data = array();
        $data['menu'] = $item;


        $data['types'] = MenuItemModel::getTypeOfMenuItem();
        $data['menus'] = MenuModel::all();
        $data['menuitems'] = MenuItemModel::getMenuItemRecusiveExcept($id);

        $data['shop_categories'] = ShopCategoryModel::all();
        $data['shop_products'] = ShopProductModel::all();
        $data['content_categories'] = ContentCategoryModel::all();
        $data['content_tags'] = ContentTagModel::all();
        $data['content_pages'] = ContentPageModel::all();
        $data['content_posts'] = ContentPostModel::all();

        return view ('admin.content.menu.menuitems.edit',$data);
    }
    public function update(Request $request,$id) {
        $validatedData = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'desc' => 'required',
            'menu_id' => 'required',
        ]);
//        Để hiển thị lỗi thì phải có code show error trong file submit
        $input = $request->all();
        $item = MenuItemModel::find($id);
        // Kiểm tra xem có đổi parent_id không
        if ($item->parent_id != $input['parent_id']) {
            $change_parent = true;
        }else {
            $change_parent = false;
        }
        $old_parent_id = $item->parent_id;

        $params = array();
        $types = MenuItemModel::getTypeOfMenuItem();
        foreach ($types as $type_key => $type){
            $params['params_'.$type_key] = isset($input['params_'.$type_key]) ? $input['params_'.$type_key] : '';
        }
        $params_json = json_encode($params);


        $item->name = $input['name'];
        $item->sort = isset($input['sort']) ? (int)$input['sort'] : 0;

        $item->type = $input['type'];
        $item->desc = $input['desc'];
        $item->menu_id = $input['menu_id'];
        $item->params = $params_json;
        $item->link = isset($input['link']) ? $input['link'] : '';
        $item->icon = isset($input['icon']) ? $input['icon'] : '';
        $item->parent_id = isset($input['parent_id']) ? $input['parent_id'] : 0;

        $item->save();

        // Nếu đổi parent_id thì phải cập nhật lại con cho cả cha cũ ( giảm con ) và cha mới( tăng con )
        if ($change_parent == true && $old_parent_id > 0){
        /*
         * Đếm tổng số menu_item có cha là $item->parent_id
         */
            $total_old = DB::table('menu_items')->where('parent_id', $old_parent_id)->count();


            /*
             * Cập nhật tổng số bản ghi con cho menu_item cha
             */
            $old_parent = MenuItemModel::find($old_parent_id);
            $old_parent->total = (int)$total_old;
            $old_parent->save();
        }

        if($item->parent_id > 0){
        /*
         * Đếm tổng số menu_item có cha là $item->parent_id
         */
            $total = DB::table('menu_items')->where('parent_id', $item->parent_id)->count();


            /*
             * Cập nhật tổng số bản ghi con cho menu_item cha
             */
            $parent = MenuItemModel::find($item->parent_id);
            $parent->total = $total;
            $parent->save();
        }


        return redirect('/admin/menuitems');
    }
    public function delete($id) {
        $item = MenuItemModel::find($id);
        $data = array();
        $data['menu'] = $item;
        return view ('admin.content.menu.menuitems.delete',$data);
    }
    public function destroy($id) {
        $item = MenuItemModel::find($id);
        $item->delete();
        return redirect('/admin/menuitems');
    }
}
