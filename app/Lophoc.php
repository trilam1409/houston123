<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lophoc extends Model
{
    protected $table = 'lophoc';
    protected $fillable = [
        'Mã Lớp', 'Lớp', 'Mã Môn Học', 'Mã Giáo Viên', 'Ngày Bắt Đầu', 'Ngày Kết Thúc','branch'
    ];

    public $timestamps = false;
    protected $hidden = [
        'ID',
    ];
}
