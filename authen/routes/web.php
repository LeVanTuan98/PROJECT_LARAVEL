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
    return view('fontend.homepages.index');
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
        Route::get('create', 'Admin\MenuController@create');
        Route::get('{id}/edit', 'Admin\MenuController@edit');
        Route::get('{id}/delete', 'Admin\MenuController@delete');

        Route::post('','Admin\MenuController@store');
        Route::post('{id}','Admin\MenuController@update');
        Route::post('{id}/delete','Admin\MenuController@destroy');


        /*
     * ------------------------Route_Admin_Menu_Item--------------------
     */


        Route::get('menuitems', 'Admin\MenuItemController@index');
        Route::get('menuitems/create', 'Admin\MenuItemController@create');
        Route::get('menuitems/{id}/edit', 'Admin\MenuItemController@edit');
        Route::get('menuitems/{id}/delete', 'Admin\MenuItemController@delete');

        Route::post('menuitems','Admin\MenuItemController@store');
        Route::post('menuitems/{id}','Admin\MenuItemController@update');
        Route::post('menuitems/{id}/delete','Admin\MenuItemController@destroy');
    });

    /*
    * ------------------------Route_Admin_Users--------------------
    */
    Route::prefix('users')->group(function() {
        Route::get('',function(){
            return view('admin.content.users.index');
        }) ;
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
        Route::get('',function(){
            return view('admin.content.newletters.index');
        }) ;
    });

    /*
    * ------------------------Route_Admin_Banners--------------------
    */
    Route::prefix('banners')->group(function() {
        Route::get('',function(){
            return view('admin.content.banners.index');
        }) ;
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