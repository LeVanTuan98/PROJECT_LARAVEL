<?php

namespace App\Http\Controllers;

use App\Model\ShipperModel;
use Illuminate\Http\Request;

class ShipperController extends Controller
{
    //
    /*
     * Hàm khởi tạo của class mà sẽ được chạy ngya khi khởi tạo đối tượng
     * Hàm này luôn được chạy trước các hàm khác trong class
     */
    public function __construct()
    {
        $this->middleware('auth:shipper')->only('index');
    }

    /*
     * Phương thức trả về view khi đăng nhập seller thành công
     * @return \
     */
    public function index() {
        return view('shipper.dashboard');
    }
    /*
     * Phương thức trả về view dùng để đăng ký tài khoản seller
     */
    public function create() {
        return view('shipper.auth.register');
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
        $shipperModel = new ShipperModel();
        $shipperModel->name = $request->name;
        $shipperModel->email = $request->email;
        $shipperModel->password = bcrypt($request->password);
        $shipperModel->save();
        //
        return redirect()->route('shipper.auth.login');
    }
}
