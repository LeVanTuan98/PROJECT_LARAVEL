<?php

namespace App\Http\Controllers;

use App\Model\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Validation;


class AdminController extends Controller
{
    //
    /*
     * Hàm khởi tạo của class mà sẽ được chạy ngya khi khởi tạo đối tượng
     * Hàm này luôn được chạy trước các hàm khác trong class
     */
    public function __construct()
    {
        $this->middleware('auth:admin')->only('index');
    }


    /*
     * Phương thức trả về view khi đăng nhập admin thành công
     * @return \
     */
    public function index() {
        return view('admin.dashboard');
    }
    /*
     * Phương thức trả về view dùng để đăng ký tài khoản admin
     */
    public function create() {
        return view('admin.auth.register');
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
        $adminModel = new AdminModel();
        $adminModel->name = $request->name;
        $adminModel->email = $request->email;
        $adminModel->password = bcrypt($request->password);
        $adminModel->save();
        //
        return redirect()->route('admin.auth.login');
    }


}
