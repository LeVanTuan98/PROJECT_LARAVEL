<?php

namespace App\Http\Controllers\Auth\Shipper;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:shipper')->except('logout');
    }
    /*
     * Phương thức trả vể view để đăng nhập shipper
     */
    public function login() {
        return view('shipper.auth.login');
    }
    /*
     * Phương thức để đăng nhập cho shipper, lấy thông tin từ form có method là POST
     */
    public function loginShipper(Request $request) {
        //Validate dữ liệu đăng nhập
        $this->validate($request,array(
            'email' => 'required|email',
            'password' => 'required|min:6'
        ));

        // Đăng nhập
        if(Auth::guard('shipper')->attempt(['email' => $request->email, 'password' => $request->password],$request->remember)){
            // Nếu đăng nhập thành công thì sẽ chuyển hướng về view dashboard của shipper
            return redirect()->intended(route('shipper.dashboard'));
        }
        // Nếu đăng nhập thất bại thì quay trở lại form đăng nhập
        // Với giá trị của 2 ô input cũ là email và remember
        return redirect()->back()->withInput($request->only('email','remember'));

    }

    /*
     * Phương thức đăng xuất
     */
    public function logout() {
        Auth::guard('shipper')->logout();
        // Chuyển hướng về trang login của admin
        return redirect()->route('shipper.auth.login');
    }
}
