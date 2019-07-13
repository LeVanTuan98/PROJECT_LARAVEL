<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\ContentCategoryModel;
use App\Model\Admin\ContentPageModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ContentPageController extends Controller
{
    //
    public function index() {
        $items = DB::table('content_pages')->paginate(10);
        $data = array();
        $data['pages'] = $items ;
        return view('admin.content.content.page.index',$data) ;
    }
    public function create() {
        $data = array();
        return view('admin.content.content.page.submit',$data);
    }
    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'images' => 'required',
            'intro' => 'required',
            'desc' => 'required',
//            'view' => 'required|numeric',
//            'author_id' => 'required|numeric',
        ]);
//        Để hiển thị lỗi thì phải có code show error trong file submit
        $input = $request->all();
        $item = new ContentPageModel();
        $item->name = $input['name'];
        $item->slug = $input['slug'];
        $item->images = $input['images'];
        $item->intro = $input['intro'];
        $item->desc = $input['desc'];
        $item->view = isset($input['view']) ? $input['view'] : 0;
        $item->author_id = isset($input['author_id']) ? $input['author_id'] : 0;
        $item->save();
        return redirect('/admin/content/page');
    }
    public function edit($id) {
        $item = ContentPageModel::find($id);
        $data = array();
        $data['page'] = $item;
        return view ('admin.content.content.page.edit',$data);
    }
    public function update(Request $request,$id) {
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'images' => 'required',
            'intro' => 'required',
            'desc' => 'required',
//            'view' => 'required|numeric',
//            'author_id' => 'required|numeric',
        ]);
//        Để hiển thị lỗi thì phải có code show error trong file submit
        $input = $request->all();
        $item = ContentPageModel::find($id);
        $item->name = $input['name'];
        $item->slug = $input['slug'];
        $item->images = $input['images'];
        $item->intro = $input['intro'];
        $item->desc = $input['desc'];
        $item->view = isset($input['view']) ? $input['view'] : 0;
        $item->author_id = isset($input['author_id']) ? $input['author_id'] : 0;
        $item->save();
        return redirect('/admin/content/page');
    }
    public function delete($id) {
        $item = ContentPageModel::find($id);
        $data = array();
        $data['page'] = $item;
        return view ('admin.content.content.page.delete',$data);
    }
    public function destroy($id) {
        $item = ContentPageModel::find($id);
        $item->delete();
        return redirect('/admin/content/page');
    }

}
