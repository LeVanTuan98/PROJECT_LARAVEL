<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopProductController extends Controller
{
    //
    public function detail() {
        return view('frontend.shop.product.detail');
    }
}
