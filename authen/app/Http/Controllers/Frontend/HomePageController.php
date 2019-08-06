<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Front\BannerModel;
use App\Model\Front\BrandModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomePageController extends Controller
{
    //
    public function index() {
        $data = array();
        $data['banner_main'] = BannerModel::getBannerByLocation(1);
        $data['banner_sale_1'] = BannerModel::getBannerByLocation(2);
        $data['banner_sale_2'] = BannerModel::getBannerByLocation(3);
        $data['banner_sale_3'] = BannerModel::getBannerByLocation(4);
        $data['banner_sale_4'] = BannerModel::getBannerByLocation(5);
        $data['banner_sale_5'] = BannerModel::getBannerByLocation(6);

        $data['brands'] = BrandModel::all();
        return view('frontend.homepages.index',$data);
    }
}
