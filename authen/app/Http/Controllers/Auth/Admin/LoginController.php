<?php

namespace App\Http\Controllers\Auth\Admin;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    //
    public function __construct()
    {
        // Xác thực phương thức này
        $this->middleware('guest:admin')->except('logout');
    }

    /*
     * Phương thức trả vể view để đăng nhập admin
     */
    public function login() {
//        return view('admin.auth.login');
        return view('admin.auth.logintemplate');
    }
    /*
     * Phương thức để đăng nhập cho admin, lấy thông tin từ form có method là POST
     */
    public function loginAdmin(Request $request) {
        //Validate dữ liệu đăng nhập
        $this->validate($request,array(
            'email' => 'required|email',
            'password' => 'required|min:6'
        ));

        // Đăng nhập
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password],$request->remember)){
            // Nếu đăng nhập thành công thì sẽ chuyển hướng về view dashboard của admin
            return redirect()->intended(route('admin.dashboard'));
        }
        // Nếu đăng nhập thất bại thì quay trở lại form đăng nhập
        // Với giá trị của 2 ô input cũ là email và remember
        return redirect()->back()->withInput($request->only('email','remember'));

    }
    /*
     * Phương thức đăng xuất
     */
    public function logout() {
        Auth::guard('admin')->logout();
        // Chuyển hướng về trang login của admin
        return redirect()->route('admin.auth.login');
    }
}
