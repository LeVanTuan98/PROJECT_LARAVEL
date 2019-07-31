<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContentPageController extends Controller
{
    //
    public function detail() {
        return view('frontend.content.page.detail');
    }
}
