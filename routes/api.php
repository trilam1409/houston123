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
    Route::post('change_pass', 'AccountController@changePassword');
    Route::resource('account', 'AccountController');
    Route::post('upload', 'UploadImage@upload');
    Route::put('account', 'AccountController@update');
    //Route::group(['middleware' => ['AuthenHouston']], function () {
        Route::resource('lophoc', 'LophocController');
        Route::resource('loaiql', 'LoaiquanlyController');
        Route::resource('truong-tiem-nang', 'TruongtiemnangController');
        Route::resource('monhoc', 'MonhocController');
        Route::resource('phonghoc', 'PhonghocController');
        Route::resource('dkmonhoc', 'DKmonhocController');
        Route::post('dktrongoi', 'DKmonhocController@store_trongoi');
        Route::resource('chitietlop', 'DanhsachlopController');
        Route::resource('giaovien', 'GiaovienController');
        Route::resource('hocvien', 'HocvienController');
        Route::resource('quanly', 'QuanlyController');
        Route::resource('coso', 'CosoController');
        Route::resource('chuongtrinhbosung', 'ChuongtrinhbosungController');
        Route::resource('to-roi', 'ThongTinToRoiController');
        //Route::resource('cskh-cu', 'CSKHcuController');
        Route::get('lop-hv-trong/{id}', 'DanhsachlopController@classNullStudent');
        Route::get('lop-gv-trong/{id}', 'LophocController@classNullTeacher');
        
    //});

    Route::get('data-training','HocvienController@DataTraining');

    Route::get('cskh-cu', 'SummaryController@CSKHcu');
    Route::get('call-hang-ngay', 'SummaryController@callHangNgay');
    Route::get('call-data', 'SummaryController@callData');
    Route::get('cskh', 'SummaryController@CSKH');
    Route::get('data-truong-tiem-nang', 'SummaryController@DataTruongTiemNang');
    Route::get('data-tuvan', 'SummaryController@datadituvan');
    Route::get('truong-tiem-nang', 'SummaryController@TruongTiemNang');
    

    Route::get('simple', 'AccountController@test');
});






