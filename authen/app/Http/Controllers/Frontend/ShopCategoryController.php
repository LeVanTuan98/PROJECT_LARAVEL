<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopCategoryController extends Controller
{
    //

    public function detail() {
        return view('frontend.shop.category.detail');
    }
}
