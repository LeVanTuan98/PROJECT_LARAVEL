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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
 * Homepage Route
 */
Route::get('/', 'Frontend\HomePageController@index');

/*
 * Frontend route for shop category
 */
Route::get('shop/category/{id}', 'Frontend\ShopCategoryController@detail');

/*
 * Frontend route for shop product
 */
Route::get('shop/product/{id}', 'Frontend\ShopProductController@detail');

/*
 * Frontend route for cart ( giỏ hàng )
 */
Route::get('shop/cart', 'Frontend\ShopCartController@index');

/*
 * Frontend route for payment ( thanh toán )
 */
Route::get('shop/payment', 'Frontend\ShopPaymentController@index');

/*
 * Frontend route for CMS page
 */
Route::get('page/{id}', 'Frontend\ContentPageController@detail');

/*
 * Frontend route for content category
 */
Route::get('content/category/{id}', 'Frontend\ContentCategoryController@detail');

/*
 * Frontend route for content category
 */
Route::get('content/tag/{id}', 'Frontend\ContentTagController@detail');
/*
 * Frontend route for content product
 */
Route::get('content/post/{id}', 'Frontend\ContentPostController@detail');


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
        /*
        * ------------------------Route_Admin_Shopping_Category--------------------
        */

        Route::get('category', 'Admin\ShopCategoryController@index');
        Route::get('category/create', 'Admin\ShopCategoryController@create');
        Route::get('category/{id}/edit', 'Admin\ShopCategoryController@edit');
        Route::get('category/{id}/delete', 'Admin\ShopCategoryController@delete');

        Route::post('category','Admin\ShopCategoryController@store');
        Route::post('category/{id}','Admin\ShopCategoryController@update');
        Route::post('category/{id}/delete','Admin\ShopCategoryController@destroy');

        /*
       * ------------------------Route_Admin_Shopping_Product--------------------
       */
        Route::get('product','Admin\ShopProductController@index');
        Route::get('product/create', 'Admin\ShopProductController@create');
        Route::get('product/{id}/edit', 'Admin\ShopProductController@edit');
        Route::get('product/{id}/delete', 'Admin\ShopProductController@delete');

        Route::post('product','Admin\ShopProductController@store');
        Route::post('product/{id}','Admin\ShopProductController@update');
        Route::post('product/{id}/delete','Admin\ShopProductController@destroy');


        Route::get('order',function (){
            return view('admin.content.shop.order.index') ;
        });

        Route::get('review',function (){
            return view('admin.content.shop.review.index') ;
        });
        /*
         * ------------------------Route_Customer_Manager--------------------
         */

        Route::get('customer','Admin\CustomerManagerController@index');
        Route::get('customer/create', 'Admin\CustomerManagerController@create');
        Route::get('customer/{id}/edit', 'Admin\CustomerManagerController@edit');
        Route::get('customer/{id}/delete', 'Admin\CustomerManagerController@delete');

        Route::post('customer','Admin\CustomerManagerController@store');
        Route::post('customer/{id}','Admin\CustomerManagerController@update');
        Route::post('customer/{id}/delete','Admin\CustomerManagerController@destroy');

        /*
        * ------------------------Route_Shipper_Manager--------------------
        */


        Route::get('shipper','Admin\ShipperManagerController@index');
        Route::get('shipper/create', 'Admin\ShipperManagerController@create');
        Route::get('shipper/{id}/edit', 'Admin\ShipperManagerController@edit');
        Route::get('shipper/{id}/delete', 'Admin\ShipperManagerController@delete');

        Route::post('shipper','Admin\ShipperManagerController@store');
        Route::post('shipper/{id}','Admin\ShipperManagerController@update');
        Route::post('shipper/{id}/delete','Admin\ShipperManagerController@destroy');


        /*
        * ------------------------Route_Seller_Manager--------------------
        */


        Route::get('seller','Admin\SellerManagerController@index');
        Route::get('seller/create', 'Admin\SellerManagerController@create');
        Route::get('seller/{id}/edit', 'Admin\SellerManagerController@edit');
        Route::get('seller/{id}/delete', 'Admin\SellerManagerController@delete');

        Route::post('seller','Admin\SellerManagerController@store');
        Route::post('seller/{id}','Admin\SellerManagerController@update');
        Route::post('seller/{id}/delete','Admin\SellerManagerController@destroy');



        /*
        * ------------------------Route_Brand--------------------
        */


        Route::get('brand','Admin\ShopBrandController@index');
        Route::get('brand/create', 'Admin\ShopBrandController@create');
        Route::get('brand/{id}/edit', 'Admin\ShopBrandController@edit');
        Route::get('brand/{id}/delete', 'Admin\ShopBrandController@delete');

        Route::post('brand','Admin\ShopBrandController@store');
        Route::post('brand/{id}','Admin\ShopBrandController@update');
        Route::post('brand/{id}/delete','Admin\ShopBrandController@destroy');


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
    /*
      * ------------------------Route_Admin_Content_Category--------------------
      */

        Route::get('category', 'Admin\ContentCategoryController@index');
        Route::get('category/create', 'Admin\ContentCategoryController@create');
        Route::get('category/{id}/edit', 'Admin\ContentCategoryController@edit');
        Route::get('category/{id}/delete', 'Admin\ContentCategoryController@delete');

        Route::post('category','Admin\ContentCategoryController@store');
        Route::post('category/{id}','Admin\ContentCategoryController@update');
        Route::post('category/{id}/delete','Admin\ContentCategoryController@destroy');


        /*
         * ------------------------Route_Admin_Content_Post--------------------
         */


        Route::get('post', 'Admin\ContentPostController@index');
        Route::get('post/create', 'Admin\ContentPostController@create');
        Route::get('post/{id}/edit', 'Admin\ContentPostController@edit');
        Route::get('post/{id}/delete', 'Admin\ContentPostController@delete');

        Route::post('post','Admin\ContentPostController@store');
        Route::post('post/{id}','Admin\ContentPostController@update');
        Route::post('post/{id}/delete','Admin\ContentPostController@destroy');


        /*
        * ------------------------Route_Admin_Content_Page--------------------
        */


        Route::get('page', 'Admin\ContentPageController@index');
        Route::get('page/create', 'Admin\ContentPageController@create');
        Route::get('page/{id}/edit', 'Admin\ContentPageController@edit');
        Route::get('page/{id}/delete', 'Admin\ContentPageController@delete');

        Route::post('page','Admin\ContentPageController@store');
        Route::post('page/{id}','Admin\ContentPageController@update');
        Route::post('page/{id}/delete','Admin\ContentPageController@destroy');

        /*
       * ------------------------Route_Admin_Content_Page--------------------
       */


        Route::get('tag', 'Admin\ContentTagController@index');
        Route::get('tag/create', 'Admin\ContentTagController@create');
        Route::get('tag/{id}/edit', 'Admin\ContentTagController@edit');
        Route::get('tag/{id}/delete', 'Admin\ContentTagController@delete');

        Route::post('tag','Admin\ContentTagController@store');
        Route::post('tag/{id}','Admin\ContentTagController@update');
        Route::post('tag/{id}/delete','Admin\ContentTagController@destroy');

    });
    /*
    * ------------------------Route_Admin_Menu--------------------
    */
    Route::prefix('menu')->group(function() {

        /*
       * ------------------------Route_Admin_Menu--------------------
       */


        Route::get('', 'Admin\MenuController@index');
        Route::get('/create', 'Admin\MenuController@create');
        Route::get('/{id}/edit', 'Admin\MenuController@edit');
        Route::get('/{id}/delete', 'Admin\MenuController@delete');

        Route::post('/','Admin\MenuController@store');
        Route::post('/{id}','Admin\MenuController@update');
        Route::post('/{id}/delete','Admin\MenuController@destroy');

    });
    /*
  * ------------------------Route_Admin_Menu_Item--------------------
  */

    Route::prefix('menuitems')->group(function (){
        Route::get('', 'Admin\MenuItemController@index');
        Route::get('create', 'Admin\MenuItemController@create');
        Route::get('{id}/edit', 'Admin\MenuItemController@edit');
        Route::get('{id}/delete', 'Admin\MenuItemController@delete');

        Route::post('','Admin\MenuItemController@store');
        Route::post('{id}','Admin\MenuItemController@update');
        Route::post('{id}/delete','Admin\MenuItemController@destroy');
    });



    /*
    * ------------------------Route_Admin_Users--------------------
    */
    Route::prefix('users')->group(function() {
        Route::get('', 'Admin\AdminManagerController@index');
        Route::get('create', 'Admin\AdminManagerController@create');
        Route::get('{id}/edit', 'Admin\AdminManagerController@edit');
        Route::get('{id}/delete', 'Admin\AdminManagerController@delete');

        Route::post('','Admin\AdminManagerController@store');
        Route::post('{id}','Admin\AdminManagerController@update');
        Route::post('{id}/delete','Admin\AdminManagerController@destroy');
    });

    /*
    * ------------------------Route_Admin_Media--------------------
    */
    Route::prefix('media')->group(function() {
        Route::get('',function(){
            return view('admin.content.media.index');
        }) ;
    });

    /*
    * ------------------------Route_Admin_Config--------------------
    */
    Route::prefix('config')->group(function() {

        Route::get('', 'Admin\ConfigController@index');

        Route::post('','Admin\ConfigController@store');


    });

    /*
    * ------------------------Route_Admin_Newletters--------------------
    */
    Route::prefix('newletters')->group(function() {

        Route::get('', 'Admin\NewletterController@index');
        Route::get('create', 'Admin\NewletterController@create');
        Route::get('{id}/edit', 'Admin\NewletterController@edit');
        Route::get('{id}/delete', 'Admin\NewletterController@delete');

        Route::post('','Admin\NewletterController@store');
        Route::post('{id}','Admin\NewletterController@update');
        Route::post('{id}/delete','Admin\NewletterController@destroy');
    });

    /*
    * ------------------------Route_Admin_Banners--------------------
    */
    Route::prefix('banners')->group(function() {
        Route::get('', 'Admin\BannerController@index');
        Route::get('create', 'Admin\BannerController@create');
        Route::get('{id}/edit', 'Admin\BannerController@edit');
        Route::get('{id}/delete', 'Admin\BannerController@delete');

        Route::post('','Admin\BannerController@store');
        Route::post('{id}','Admin\BannerController@update');
        Route::post('{id}/delete','Admin\BannerController@destroy');
    });

    /*
    * ------------------------Route_Admin_Contact--------------------
    */
    Route::prefix('contact')->group(function() {
        Route::get('',function(){
            return view('admin.content.contact.index');
        }) ;
    });

    /*
    * ------------------------Route_Admin_Email--------------------
    */
    Route::prefix('email')->group(function() {
        Route::get('inbox',function(){
            return view('admin.content.email.inbox.index');
        }) ;
        Route::get('draft',function(){
            return view('admin.content.email.draft.index');
        }) ;
        Route::get('send',function(){
            return view('admin.content.email.send.index');
        }) ;
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