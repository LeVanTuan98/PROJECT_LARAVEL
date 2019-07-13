<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\MenuModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    //
    public function index() {
        $items = DB::table('menus')->paginate(10);
        $data = array();
        $data['menus'] = $items ;
        return view('admin.content.menu.index',$data) ;
    }
    public function create() {
        $data = array();
        return view('admin.content.menu.submit',$data);
    }
    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'desc' => 'required',
        ]);
//        Để hiển thị lỗi thì phải có code show error trong file submit
        $input = $request->all();
        $item = new MenuModel();
        $item->name = $input['name'];
        $item->slug = $input['slug'];
        $item->desc = $input['desc'];
        $item->location = isset($input['location']) ? $input['location'] : 0;
        $item->save();
        return redirect('/admin/menu');
    }
    public function edit($id) {
        $item = MenuModel::find($id);
        $data = array();
        $data['menu'] = $item;
        return view ('admin.content.menu.edit',$data);
    }
    public function update(Request $request,$id) {
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'desc' => 'required',
        ]);
//        Để hiển thị lỗi thì phải có code show error trong file submit
        $input = $request->all();
        $item = MenuModel::find($id);
        $item->name = $input['name'];
        $item->slug = $input['slug'];
        $item->desc = $input['desc'];
        $item->location = isset($input['location']) ? $input['location'] : 0;

        $item->save();
        return redirect('/admin/menu');
    }
    public function delete($id) {
        $item = MenuModel::find($id);
        $data = array();
        $data['menu'] = $item;
        return view ('admin.content.menu.delete',$data);
    }
    public function destroy($id) {
        $item = MenuModel::find($id);
        $item->delete();
        return redirect('/admin/menu');
    }
}
