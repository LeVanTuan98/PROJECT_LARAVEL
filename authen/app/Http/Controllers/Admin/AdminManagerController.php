<?php

namespace App\Http\Controllers\Admin;

use App\Model\AdminModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:admin");
    }

    //
    public function index() {
        $items = DB::table('admins')->paginate(10);
        $data = array();
        $data['admins'] = $items ;
        return view('admin.content.users.index',$data) ;
    }
    public function create() {
        $data = array();
        return view('admin.content.users.submit',$data);
    }
    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'images' => 'required',
            'intro' => 'required',
//            'view' => 'required|numeric',
//            'author_id' => 'required|numeric',
        ]);
//        Để hiển thị lỗi thì phải có code show error trong file submit
        $input = $request->all();
        $item = new AdminModel();
        $item->name = $input['name'];
        $item->slug = $input['slug'];
        $item->images = $input['images'];
        $item->intro = $input['intro'];
        $item->view = isset($input['view']) ? $input['view'] : 0;
        $item->author_id = isset($input['author_id']) ? $input['author_id'] : 0;
        $item->save();
        return redirect('/admin/users');
    }
    public function edit($id) {
        $item = AdminModel::find($id);
        $data = array();
        $data['admin'] = $item;
        return view ('admin.content.users.edit',$data);
    }
    public function update(Request $request,$id) {
//        $validatedData = $request->validate([
//            'name' => 'required',
//            'slug' => 'required',
//            'images' => 'required',
//            'intro' => 'required',
////            'view' => 'required|numeric',
////            'author_id' => 'required|numeric',
//        ]);
////        Để hiển thị lỗi thì phải có code show error trong file submit
//        $input = $request->all();
//        $item = ContentTagModel::find($id);
//        $item->name = $input['name'];
//        $item->slug = $input['slug'];
//        $item->images = $input['images'];
//        $item->intro = $input['intro'];
//        $item->view = isset($input['view']) ? $input['view'] : 0;
//        $item->author_id = isset($input['author_id']) ? $input['author_id'] : 0;
//        $item->save();
//        return redirect('/admin/content/tag');
    }
    public function delete($id) {
        $item = AdminModel::find($id);
        $data = array();
        $data['admin'] = $item;
        return view ('admin.content.users.delete',$data);
    }
    public function destroy($id) {
        /*$item = ContentTagModel::find($id);
        $item->delete();
        return redirect('/admin/content/tag');*/
    }
}
