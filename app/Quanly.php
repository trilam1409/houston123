<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quanly extends Model
{
    protected $table = "quanly";

    protected $fillable = [
        'Mã Quản Lý', 'Họ Và Tên', 'Hình Ảnh', 'Số Điện Thoại', 'Địa chỉ', 'CMND', 'Chức Vụ', 'Cơ Sở',
    ];

    public $timestamps = false;

    protected $hidden = [
        'STT', 
    ];
}
