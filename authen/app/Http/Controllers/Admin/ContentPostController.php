<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\ContentCategoryModel;
use App\Model\Admin\ContentPostModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ContentPostController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("auth:admin");
    }
    public function index() {
        $items = DB::table('content_posts')->paginate(10);
        $data = array();
        $data['posts'] = $items ;
        return view('admin.content.content.post.index',$data) ;
    }
    public function create() {
        $cats = ContentCategoryModel::all();
        $data = array();
        $data['cats'] = $cats;
        return view('admin.content.content.post.submit',$data);
    }
    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'images' => 'required',
            'intro' => 'required',
            'desc' => 'required',
            'cat_id' => 'required|numeric',
//            'view' => 'required|numeric',
//            'author_id' => 'required|numeric',
        ]);
//        Để hiển thị lỗi thì phải có code show error trong file submit
        $input = $request->all();
        $item = new ContentPostModel();
        $item->name = $input['name'];
        $item->slug = $input['slug'];
        $item->images = $input['images'];
        $item->intro = $input['intro'];
        $item->desc = $input['desc'];
        $item->cat_id = $input['cat_id'];
        $item->view = isset($input['view']) ? $input['view'] : 0;
        $item->author_id = isset($input['author_id']) ? $input['author_id'] : 0;
        $item->save();
        return redirect('/admin/content/post');
    }
    public function edit($id) {
        $item = ContentPostModel::find($id);
        $cats = ContentCategoryModel::all();
        $data = array();
        $data['cats'] = $cats;
        $data['post'] = $item;
        return view ('admin.content.content.post.edit',$data);
    }
    public function update(Request $request,$id) {
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'images' => 'required',
            'intro' => 'required',
            'desc' => 'required',
            'cat_id' => 'required|numeric',
//            'view' => 'required|numeric',
//            'author_id' => 'required|numeric',
        ]);
//        Để hiển thị lỗi thì phải có code show error trong file submit
        $input = $request->all();
        $item = ContentPostModel::find($id);
        $item->name = $input['name'];
        $item->slug = $input['slug'];
        $item->images = $input['images'];
        $item->intro = $input['intro'];
        $item->desc = $input['desc'];
        $item->cat_id = $input['cat_id'];
        $item->view = isset($input['view']) ? $input['view'] : 0;
        $item->author_id = isset($input['author_id']) ? $input['author_id'] : 0;
        $item->save();
        return redirect('/admin/content/post');
    }
    public function delete($id) {
        $item = ContentPostModel::find($id);
        $data = array();
        $data['post'] = $item;
        return view ('admin.content.content.post.delete',$data);
    }
    public function destroy($id) {
        $item = ContentPostModel::find($id);
        $item->delete();
        return redirect('/admin/content/post');
    }
}
