<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Front\ShopProductModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopCartController extends Controller
{
    //View Giỏ hàng
    public function index() {
        $data = array();

        $cartCollection = \Cart::getContent();

// NOTE: Because cart collection extends Laravel's Collection
// You can use methods you already know about Laravel's Collection
// See some of its method below:

// count carts contents
        $cartCollection->count();

// transformations
        $cartCollection->toArray();
        $cartCollection->toJson();

        return view ('frontend.cart.index',$data);
    }

    // Add to cart
    public function add(Request $request) {

        $input = $request->all();

        $product_id = (int)$input['w3ls1_item'];
        $quatity = (int)$input['add'];

        $product = ShopProductModel::find($product_id);
        $response['status'] = 0;
        if ($product->id) {
            \Cart::add(array(
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->priceSale,
                'quantity' => $quatity,
                'attributes' => array()
            ));
            $response['status'] = 1;
        }
        echo json_encode($response);
        exit;
    }

    // Update to cart
    public function update() {

    }

    // Remove giỏ hàng
    public function remove(){

    }

    // Clear toàn bộ giỏ hàng
    public function clear() {

    }
}
