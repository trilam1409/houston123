<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->account();
});

Route::group(['namespace' => 'api'], function () {
    Route::post('login', 'AccountController@login');
    Route::post('register', 'AccountController@register');
    Route::post('register_info', 'AccountController@register_info');
    Route::get('logout', 'AccountController@logout');
    Route::get('account', 'AccountController@account');
    Route::resource('loaiql', 'LoaiquanlyController');
    Route::resource('truong-tiem-nang', 'TruongtiemnangController');
    Route::resource('monhoc', 'MonhocController');
    Route::resource('lophoc', 'LophocController');
    Route::resource('phonghoc', 'PhonghocController');

    Route::get('simple', 'AccountController@test');
    Route::resource('giaovien', 'GiaovienController');
    Route::resource('hocvien', 'HocvienController');
    Route::resource('quanly', 'QuanlyController');
    Route::resource('coso', 'CosoController');
});




