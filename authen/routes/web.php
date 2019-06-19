<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
 * Route cho adminstrator
 */
Route::prefix('admin')->group(function () {
    //Gom nhóm các Route cho Admin

    /*
     * ------------------------Route_Admin_Authentication--------------------
     */
    /*
     * URL: authen.com/admin_assets/
     * Route mặc định của admin_assets
     */
    Route::get('/','AdminController@index')->name('admin.dashboard');

    /*
     * URL: authen.com/admin_assets/dashboard
     * Đăng nhập thành công
     */
    Route::get('/dashboard','AdminController@index')->name('admin.dashboard');

    /*
     * URL: authen.com/admin_assets/register
     * Route dùng để trả về view dùng để đăng ký tài khoản admin_assets
     */
    Route::get('register','AdminController@create')->name('admin.register');

    /*
     * URL: authen.com/admin_assets/register
     * phương thức là POST
     * Route dùng để đăng ký: admin_assets từ form POST
     */
    Route::post('register','AdminController@store')->name('admin.register.store');

    /*
     * URL: authen.com/admin_assets/Login
     * Route trả về view đăng nhập admin_assets
     */

    Route::get('login','Auth\Admin\LoginController@login')->name('admin.auth.login');

    /*
     * URL : authen.com/admin_assets/login
     * Route xử lý quá trình đăng nhập Admin
     * Method: Post
     */
    Route::post('login','Auth\Admin\LoginController@LoginAdmin')->name('admin.auth.loginAdmin');

    /*
     * URL : authen.com/admin_assets/logout
     * method: Post
     * Route dùng để đăng xuất
     */
    Route::post('logout','Auth\Admin\LoginController@logout')->name('admin.auth.logout');

    /*
     * ------------------------Route_Admin_Shopping--------------------
     */
    Route::prefix('shop')->group(function () {

        Route::get('category',function (){
            return view('admin.content.shop.category.index') ;
        });

        Route::get('product',function (){
            return view('admin.content.shop.product.index') ;
        });

        Route::get('order',function (){
            return view('admin.content.shop.order.index') ;
        });

        Route::get('review',function (){
            return view('admin.content.shop.review.index') ;
        });

        Route::get('customer',function (){
            return view('admin.content.shop.customer.index') ;
        });

        Route::get('brand',function (){
            return view('admin.content.shop.brand.index') ;
        });

        Route::get('statistic',function (){
            return view('admin.content.shop.statistic.index') ;
        });

    });
    /*
     * ------------------------Route_Admin_Order--------------------
     */
    Route::prefix('order')->group(function () {

        Route::get('product',function (){
            return view('admin.content.order-admin.index') ;
        });

    });

    /*
     * ------------------------Route_Admin_Content--------------------
     */
    Route::prefix('content')->group(function () {

        Route::get('category',function (){
            return view('admin.content.content.category.index') ;
        });

        Route::get('post',function (){
            return view('admin.content.content.post.index') ;
        });

        Route::get('page',function (){
            return view('admin.content.content.page.index') ;
        });

        Route::get('tag',function (){
            return view('admin.content.content.tag.index') ;
        });

    });
});

/*
 * Route cho các nhà cung cấp sản phẩm (Seller)
 */

Route::prefix('seller')->group(function () {
    //Gom nhóm các Route cho Seller

    /*
     * URL: authen.com/seller/
     * Route mặc định của seller
     */
    Route::get('/','SellerController@index')->name('seller.dashboard');

    /*
     * URL: authen.com/seller/dashboard
     * Đăng nhập thành công
     */
    Route::get('/dashboard','SellerController@index')->name('seller.dashboard');

    /*
     * URL: authen.com/seller/register
     * Route dùng để trả về view dùng để đăng ký tài khoản seller
     */
    Route::get('register','SellerController@create')->name('seller.register');

    /*
     * URL: authen.com/seller/register
     * phương thức là POST
     * Route dùng để đăng ký: seller từ form POST
     */
    Route::post('register','SellerController@store')->name('seller.register.store');

    /*
     * URL: authen.com/seller/Login
     * Route trả về view đăng nhập seller
     */

    Route::get('login','Auth\Seller\LoginController@login')->name('seller.auth.login');

    /*
     * URL : authen.com/seller/login
     * Route xử lý quá trình đăng nhập seller
     * Method: Post
     */
    Route::post('login','Auth\Seller\LoginController@LoginSeller')->name('seller.auth.loginSeller');

    /*
     * URL : authen.com/seller/logout
     * method: Post
     * Route dùng để đăng xuất
     */
    Route::post('logout','Auth\Seller\LoginController@logout')->name('seller.auth.logout');
});
/*
 * Route cho các nhà vận chuyển (Shipper)
 */
Route::prefix('shipper')->group(function () {
    //Gom nhóm các Route cho Shipper

    /*
     * URL: authen.com/shipper/
     * Route mặc định của shipper
     */
    Route::get('/','ShipperController@index')->name('shipper.dashboard');

    /*
     * URL: authen.com/shipper/dashboard
     * Đăng nhập thành công
     */
    Route::get('/dashboard','ShipperController@index')->name('shipper.dashboard');

    /*
     * URL: authen.com/shipperregister
     * Route dùng để trả về view dùng để đăng ký tài khoản shipper
     */
    Route::get('register','ShipperController@create')->name('shipper.register');

    /*
     * URL: authen.com/shipper/register
     * phương thức là POST
     * Route dùng để đăng ký: shipper từ form POST
     */
    Route::post('register','ShipperController@store')->name('shipper.register.store');

    /*
     * URL: authen.com/shipperLogin
     * Route trả về view đăng nhập shipper
     */

    Route::get('login','Auth\Shipper\LoginController@login')->name('shipper.auth.login');

    /*
     * URL : authen.com/shipper/login
     * Route xử lý quá trình đăng nhập shipper
     * Method: Post
     */
    Route::post('login','Auth\Shipper\LoginController@LoginShipper')->name('shipper.auth.loginShipper');

    /*
     * URL : authen.com/shipper/logout
     * method: Post
     * Route dùng để đăng xuất
     */
    Route::post('logout','Auth\Shipper\LoginController@logout')->name('shipper.auth.logout');
});