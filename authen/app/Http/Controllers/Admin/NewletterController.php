<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\NewletterModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NewletterController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("auth:admin");
    }
    public function index() {
        $items = DB::table('newletters')->paginate(10);
        $data = array();
        $data['newletters'] = $items ;
        return view('admin.content.newletters.index',$data);
    }
    public function create() {
        $data = array();
        return view('admin.content.newletters.submit',$data);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'email' => 'required',
        ]);
        $input = $request->all();
        $item = new NewletterModel();
        $item->email = $input['email'];
        $item->save();
        return redirect('/admin/newletters');
    }
    public function edit($id) {
        $item = NewletterModel::find($id);
        $data = array();
        $data['newletter'] = $item;
        return view ('admin.content.newletters.edit',$data);
    }

    public function update(Request $request,$id) {
        $validatedData = $request->validate([
            'email' => 'required',
        ]);
        $input = $request->all();
        $item = NewletterModel::find($id);
        $item->email = $input['email'];
        $item->save();
        return redirect('/admin/newletters');

    }
    public function delete($id) {
        $item = NewletterModel::find($id);
        $data = array();
        $data['newletter'] = $item;
        return view ('admin.content.newletters.delete',$data);
    }

    public function destroy($id) {
        $item = NewletterModel::find($id);
        $item->delete();
        return redirect('/admin/newletters');
    }
}
