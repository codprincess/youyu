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

Route::any('/wx/pay/notify', 'PayController@notify');
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    //登录
    Route::get('/login', 'LoginController@showLoginForm')->name('admin.loginForm');
    Route::post('/login', 'LoginController@login')->name('admin.login');
    Route::get('logout', 'LoginController@logout')->name('admin.logout');

    //后台页面
    Route::get('data','IndexController@data')->name('admin.data');
    Route::get('/index', 'IndexController@layout');
    Route::get('/index1', 'IndexController@index')->name('admin.index1');
    Route::get('/index2', 'IndexController@index1')->name('admin.index2');
    Route::get('/index3', 'IndexController@index2')->name('admin.index3');

    //数据
    Route::get('/admindata', 'AdminController@data')->name('admin.admindata');
//    Route::get('/data','AdminController@data')->name('admin.user.data');
    //用户
    Route::get('/user', 'AdminController@index')->name('admin.user');
    //添加
    Route::get('/user/create', 'AdminController@create')->name('admin.user.create');
    Route::post('user/store', 'AdminController@store')->name('admin.user.store');
    //编辑
    Route::get('/user/{id}/edit', 'AdminController@edit')->name('admin.user.edit');
    Route::put('user/{id}/update', 'AdminController@update')->name('admin.user.update');
    //删除
    Route::delete('user/destroy', 'AdminController@destroy')->name('admin.user.destroy');

    //场馆数据
    Route::get('/venuedata', 'VenueController@data')->name('admin.venue.data');
    //场馆
    Route::get('venues', 'VenueController@index')->name('admin.venues');
    //添加
    Route::get('venues/create', 'VenueController@create')->name('admin.venues.create');
    Route::post('venues/store', 'VenueController@store')->name('admin.venues.store');
    //编辑
    Route::get('venues/{id}/edit', 'VenueController@edit')->name('admin.venues.edit');
    Route::put('venues/{id}/update', 'VenueController@update')->name('admin.venues.update');
    //删除
    Route::delete('venues/destroy', 'VenueController@destroy')->name('admin.venues.destroy');

    //添加场次
    Route::get('venuestime/create', 'VenueTimeController@create')->name('admin.venuesTime.create');
    Route::get('venuestime/store', 'VenueTimeController@store')->name('admin.venuesTime.store');

    //获取微信登录用户信息
    Route::get('/userdata', 'MemberController@data')->name('admin.member.data');
    Route::get('members', 'MemberController@index')->name('admin.members');

    //图片上传
    Route::post('uploadImg', 'UploadController@uploadImg')->name('uploadImg');
    Route::get('banner', 'BannerController@index')->name('admin.banners');
    //添加
    Route::get('banner/create', 'BannerController@create')->name('admin.banners.create');
    Route::post('banner/store', 'BannerController@store')->name('admin.banners.store');
    //编辑
    Route::get('banner/{id}/edit', 'BannerController@edit')->name('admin.banners.edit');
    Route::put('banner/{id}/update', 'BannerController@update')->name('admin.banners.update');
    //图片数据
    Route::get('/bannerdata', 'BannerController@data')->name('admin.banners.data');
    //删除
    Route::delete('banner/destroy', 'BannerController@destroy')->name('admin.banners.destroy');

    //角色管理
    Route::get('role','RoleController@index')->name('admin.role');
    //添加
    Route::get('role/create','RoleController@create')->name('admin.role.create');
    Route::post('role/store','RoleController@store')->name('admin.role.store');
    //编辑
    Route::get('role/{id}/edit','RoleController@edit')->name('admin.role.edit');
    Route::put('role/{id}/update','RoleController@update')->name('admin.role.update');
    //删除
    Route::delete('role/destroy','RoleController@destroy')->name('admin.role.destroy');


    //权限管理
    Route::get('permission','PermissionController@index')->name('admin.permission');
    //添加
    Route::get('permission/create','PermissionController@create')->name('admin.permission.create');
    Route::post('permission/store','PermissionController@store')->name('admin.permission.store');
    //编辑
    Route::get('permission/{id}/edit','PermissionController@edit')->name('admin.permission.edit');
    Route::put('permission/{id}/update','PermissionController@update')->name('admin.permission.update');
    //删除
    Route::delete('permission/destroy','PermissionController@destroy')->name('admin.permission.destroy');

});


Route::group(['namespace' => 'Home'], function () {
     Route::get('/', 'IndexController@index')->middleware('weChatAuth');
    //Route::get('/', 'IndexController@index');


    Route::get('/auth', "UserController@auth");
    Route::get('/login', "UserController@getAccessToken");

// 必须写在最后面
    //  Route::view('/{query}', 'home.layout')->where('query', '.*')->middleware('weChatAuth');

});