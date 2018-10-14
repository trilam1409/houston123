<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Giaovien extends Model
{
    protected $table = "GIAOVIEN";

    protected $fillable =[
        'Mã Giáo Viên', 'Họ Và Tên', 'Hình Ảnh', 'Số Điện Thoại', 'Địa Chỉ', 'Email', 'CMND', 'Cơ Sở',
    ];

    public $timestamps = false;

    protected $hidden = [
        'STT', 'Mã Giáo Viên',
    ];
}
