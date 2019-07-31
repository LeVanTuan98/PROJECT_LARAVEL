<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContentPostController extends Controller
{
    //
    public function detail() {
        return view('frontend.content.post.detail');
    }
}
