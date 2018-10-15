<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hocvien extends Model
{
    protected $table = "users";

    protected $fillable = ([
        'User ID', 'Họ Và Tên', 'Hình Ảnh', 'Lớp', 'Số Điện Thoại', 'Địa Chỉ', 'Ngày Sinh',
        'Học Lức Đầu Vào', 'Ngày Nhập Học', ' Trường Học Chính Khóa', 'Ngày Nghỉ Học',
        'Lý Do Nghĩ', 'Họ Và Tên (NT1)', 'Số Điện Thoại (NT1)', 'Nghề Nghiệp (NT1)',
        'Họ Và Tên (NT2)', 'Số Điện Thoại (NT2)', 'Nghề Nghiệp (NT2)', 'Biết Houston123 Như Thế Nào',
        'Chính Thức', 'Cơ Sở',
    ]);

    public $timestamps = false;

    protected $hidden = ['Họ Hàng', 'isBusy', 'expires_on', 'isDeactivate'];
}
