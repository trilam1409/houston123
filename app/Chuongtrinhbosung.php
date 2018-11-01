<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chuongtrinhbosung extends Model
{
    protected $table = 'chuongtrinhhocbosung';
    protected $fillable = [
        'Tên Chương Trình', 'Chương Trình Học', 'Trọn Gói', ' Giảm Giá Áp Dụng', 'Lớp Áp Dụng', 'Cơ Sở',
    ];

    public $timestamps = false;
    protected $hidden = [
        'expiresDate', 'permissionAllowed',
    ];
}
