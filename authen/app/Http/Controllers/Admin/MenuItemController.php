<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\MenuItemModel;
use App\Model\Admin\MenuModel;
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
        $items = DB::table('menu_items')->paginate(10);

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
        return view('admin.content.menu.menuitems.submit',$data);
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
        $item->name = $input['name'];
        $item->type = $input['type'];
        $item->desc = $input['desc'];
        $item->menu_id = $input['menu_id'];
        $item->params = isset($input['params']) ? $input['params'] : '';
        $item->link = isset($input['link']) ? $input['link'] : '';
        $item->icon = isset($input['icon']) ? $input['icon'] : '';
        $item->parent_id = isset($input['parent_id']) ? $input['parent_id'] : 0;
        $item->save();
        return redirect('/admin/menu/menuitems');
    }
    public function edit($id) {
        $item = MenuItemModel::find($id);
        $data = array();
        $data['menu_item'] = $item;
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
        $item->name = $input['name'];
        $item->type = $input['type'];
        $item->desc = $input['desc'];
        $item->menu_id = $input['menu_id'];
        $item->params = isset($input['params']) ? $input['params'] : '';
        $item->link = isset($input['link']) ? $input['link'] : '';
        $item->icon = isset($input['icon']) ? $input['icon'] : '';
        $item->parent_id = isset($input['parent_id']) ? $input['parent_id'] : 0;

        $item->save();
        return redirect('/admin/menu/menuitems');
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
        return redirect('/admin/menu/menuitems');
    }
}
