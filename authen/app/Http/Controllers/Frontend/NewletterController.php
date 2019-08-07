<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Front\NewletterModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewletterController extends Controller
{
    //
    public function index(){

        return view('frontend.newletter.index');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'email' => 'required',
        ]);
        $input = $request->all();
        $item = new NewletterModel();
        $item->email = $input['email'];
        $item->save();
        return redirect('/newletter');
    }
}
