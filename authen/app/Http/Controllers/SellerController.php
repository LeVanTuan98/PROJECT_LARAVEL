<?php

namespace App\Http\Controllers;

use App\Model\SellerModel;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    //
    /*
     * Hàm khởi tạo của class mà sẽ được chạy ngya khi khởi tạo đối tượng
     * Hàm này luôn được chạy trước các hàm khác trong class
     */
    public function __construct()
    {
        $this->middleware('auth:seller')->only('index');
    }

    /*
     * Phương thức trả về view khi đăng nhập seller thành công
     * @return \
     */
    public function index() {
        return view('seller.dashboard');
    }
    /*
     * Phương thức trả về view dùng để đăng ký tài khoản seller
     */
    public function create() {
        return view('seller.auth.register');
    }
    /*
     *
     */
    public function store(Request $request) {
        // Validate dữ liệu gửi từ form đi
        $this->validate($request,array(
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ));

        // Khởi tạo model để lưu admin mới
        $sellerModel = new SellerModel();
        $sellerModel->name = $request->name;
        $sellerModel->email = $request->email;
        $sellerModel->password = bcrypt($request->password);
        $sellerModel->save();
        //
        return redirect()->route('seller.auth.login');
    }


}
