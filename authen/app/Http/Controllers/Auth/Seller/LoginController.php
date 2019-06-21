<?php

namespace App\Http\Controllers\Auth\Seller;

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
        $this->middleware('guest:seller')->except('logout');
    }
    /*
     * Phương thức trả vể view để đăng nhập seller
     */
    public function login() {
        return view('seller.auth.login');
    }
    /*
     * Phương thức để đăng nhập cho seller, lấy thông tin từ form có method là POST
     */
    public function loginSeller(Request $request) {
        //Validate dữ liệu đăng nhập
        $this->validate($request,array(
            'email' => 'required|email',
            'password' => 'required|min:6'
        ));

        // Đăng nhập
        if(Auth::guard('seller')->attempt(['email' => $request->email, 'password' => $request->password],$request->remember)){
            // Nếu đăng nhập thành công thì sẽ chuyển hướng về view dashboard của seller
            return redirect()->intended(route('seller.dashboard'));
        }
        // Nếu đăng nhập thất bại thì quay trở lại form đăng nhập
        // Với giá trị của 2 ô input cũ là email và remember
        return redirect()->back()->withInput($request->only('email','remember'));

    }

    /*
     * Phương thức đăng xuất
     */
    public function logout() {
        Auth::guard('seller')->logout();
        // Chuyển hướng về trang login của seller
        return redirect()->route('seller.auth.login');
    }
}
