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


Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    //登录
    Route::get('login', 'LoginController@showLoginForm')->name('admin.loginForm');
    Route::post('login','LoginController@login')->name('admin.login');
    Route::get('logout','LoginController@logout')->name('admin.logout');

    //后台页面
    Route::post('/uploadImg', 'PublicController@uploadImg')->name('uploadImg');
    Route::get('/', 'IndexController@layout');
    Route::get('/index', 'IndexController@index')->name('admin.index');
    Route::get('/index1', 'IndexController@index1')->name('admin.index1');
    Route::get('/index2', 'IndexController@index2')->name('admin.index2');

    //数据
    Route::get('/data','IndexController@data')->name('admin.data');
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

    //场馆
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

});


Route::group(['namespace' => 'Home'], function () {
    Route::get('/', 'IndexController@index')->middleware('weChatAuth');


    Route::get('/auth', "UserController@auth");
    Route::get('/login', "UserController@getAccessToken");

// 必须写在最后面
    Route::view('/{query}', 'home.layout')->where('query', '.*')->middleware('weChatAuth');

});