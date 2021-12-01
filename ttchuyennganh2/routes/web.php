<?php
use Illuminate\Support\Facades\Route;
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
Route::get('/admin/login', [  'as' => 'admin/login', 'uses' => 'adminController\LoginController@index']);
Route::post('/admin/login', ['uses' => 'adminController\LoginController@loginPost'])->name('admin.login.LoginPost');
Route::group(["prefix"=>"admin","middleware"=>"auth"],function(){
    Route::get('informationWebsite','adminController\InformationController@index')->name('admin.information.index');
    Route::post('informationWebsite/edit','adminController\InformationController@editPost')->name('admin.information.editPost');
    Route::get('informationWebsite/edit','adminController\InformationController@edit')->name('admin.information.edit');
    Route::get('informationWebsite/delete','adminController\InformationController@delete')->name('admin.information.delete');
    // Đăng xuất
     Route::get('logout', ['uses' => 'adminController\LoginController@getLogout'])->name('admin.login.getLogout');
    // Route::post('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@postLogin']);
    //
    Route::get('/','adminController\DashboardController@index')->name('admin.index');
    //
    Route::get('/home', 'adminController\DashboardController@index')->name('admin.index');
    Route::group(["prefix"=>"users"],function(){
        //them moi ban ghi - trang thai GET
        Route::get('/addUser','adminController\UserController@create')->name('admin.users.create');
        //
        Route::get('/', 'adminController\UserController@index')->name('admin.users.index');
        //them moi ban ghi - trang thai POST
        Route::post('/addUser','adminController\UserController@createPost')->name('admin.users.createPost');
        //sua 1 ban ghi trang thai GET
        Route::get('/editUser/{id}','adminController\UserController@edit')->name('admin.users.edit');
        // sua 1 ban ghi - trang thai POST
        Route::post('/editUser/{id}','adminController\UserController@editPost')->name('admin.users.editPost');
        //xoa 1 ban ghi trang thai GET
        Route::get('/deleteUser/{id}','adminController\UserController@delete')->name('admin.users.delete');
    });

    Route::group(["prefix"=>"review"],function(){
        Route::get('/', 'adminController\ReviewController@index')->name('admin.review.index');
        Route::get('/reviewDetail/{id}','adminController\ReviewController@reviewDetail')->name('admin.review.reviewDetail');
    });
    
    //them dau ? de ko bat buoc phai co thuoc tinh
    Route::group(["prefix"=>"product"],function(){
        //quan ly hotel
        Route::group(["prefix"=>"hotel"],function(){
            //them moi ban ghi - trang thai GET
            Route::get('/addHotel','adminController\HotelController@create')->name('admin.hotel.create');
            //them moi ban ghi - trang thai POST
            Route::post('/addHotel','adminController\HotelController@createPost')->name('admin.hotel.createPost');
            //
            Route::get('/', 'adminController\HotelController@index')->name('admin.hotel.index');
            //sua 1 ban ghi trang thai GET
            Route::get('/editHotel/{id}','adminController\HotelController@edit')->name('admin.hotel.edit');
            // sua 1 ban ghi - trang thai POST
            Route::post('/editHotel/{id}','adminController\HotelController@editPost')->name('admin.hotel.editPost');
            //xoa 1 ban ghi trang thai GET
            Route::get('/deleteHotel/{id}','adminController\HotelController@delete')->name('admin.hotel.delete');
            //chi tiet hotel
            Route::get('/hotelDetail/{id}','adminController\HotelController@hotelDetail')->name('admin.hotel.hotelDetail');
        });
        //quan ly thanh toan
        Route::group(["prefix"=>"payment"],function(){
            Route::get('/', 'adminController\PaymentController@index')->name('admin.payment.index');
            //xoa
            Route::get('/deletepayment/{id}','adminController\PaymentController@delete')->name('admin.payment.delete');
            Route::get('/paymentDetail/{id}','adminController\paymentController@paymentDetail')->name('admin.payment.paymentDetail');
            Route::get('/paymentDelivery/{id}','adminController\paymentController@paymentDelivery')->name('admin.payment.paymentDelivery');
    
        });
        //quan ly tour
        Route::group(["prefix"=>"zoom"],function(){
            //them moi ban ghi - trang thai GET
            Route::get('/addZoom','adminController\ZoomController@create')->name('admin.zoom.create');
            //them moi ban ghi - trang thai POST
            Route::post('/addZoom','adminController\ZoomController@createPost')->name('admin.zoom.createPost');
            //
            Route::get('/', 'adminController\ZoomController@index')->name('admin.zoom.index');
            //sua 1 ban ghi trang thai GET
            Route::get('/editZoom/{id}','adminController\ZoomController@edit')->name('admin.zoom.edit');
            // sua 1 ban ghi - trang thai POST
            Route::post('/editZoom/{id}','adminController\ZoomController@editPost')->name('admin.zoom.editPost');
            //xoa 1 ban ghi trang thai GET
            Route::get('/deleteZoom/{id}','adminController\ZoomController@delete')->name('admin.zoom.delete');
            //chi tiet hotel
            Route::get('/zoomDetail/{id}','adminController\ZoomController@zoomDetail')->name('admin.zoom.zoomDetail');
        });
        
     });
});
Route::get('logout', [ 'as' => 'logout', 'uses' => 'frontendController\LoginController@getLogout']);
Route::get('/login', [ 'as' => 'login', 'uses' => 'frontendController\LoginController@index']);
Route::post('/login', [ 'as' => 'login', 'uses' => 'frontendController\LoginController@loginPost']);
Route::get('/register', 'frontendController\LoginController@register')->name('login.register');
Route::post('/register', 'frontendController\LoginController@registerPost')->name('login.registerPost');

Route::get('/','frontendController\HomeController@index')->name('home.index');
Route::get('/success','frontendController\HomeController@success')->name('home.success');
Route::get('hotelDetail/{id}','frontendController\HotelController@index')->name('hotelDetail.index')->where('id', '[0-9]+');
Route::post('hotelDetail/{id}','frontendController\HotelController@rating')->name('hotelDetail.rating')->where('id', '[0-9]+');

Route::group(["prefix"=>"hotel"],function(){
    Route::get('/', 'frontendController\SearchController@index')->name('hotel.index');
    Route::get('/sortByPriceHightToLow','frontendController\SearchController@sortByPriceHighToLow')->name('hotel.sortByPriceHighToLow');
    Route::get('/sortByPriceLowToHigh','frontendController\SearchController@sortByPriceLowToHigh')->name('hotel.sortByPriceLowToHigh');
    Route::get('/sortByName','frontendController\SearchController@sortByName')->name('hotel.sortByName');
    Route::get('/sortByDefault','frontendController\SearchController@sortByDefault')->name('hotel.sortByDefault');
    Route::get('/filterByPrice/{price}','frontendController\SearchController@filterByPrice')->name('hotel.filterByPrice');
    Route::post('/', 'frontendController\SearchController@searchHotel')->name('hotel.searchHotel');
});

Route::get('hotelBooking', function () {
    return view('frontend.hotel-booking')->name('booking');;
});
Route::get('paymentDetail/{id}/{daterange}/{rooms}/{people}/{room_id}','frontendController\PaymentController@index')->name('booking.index')->where('id', '[0-9]+');
// Route::get('paymentDetail/{id}','frontendController\PaymentController@create');
Route::post('paymentDetail/{id}/{daterange}/{rooms}/{people}/{room_id}','frontendController\PaymentController@create')->name('booking.create');
