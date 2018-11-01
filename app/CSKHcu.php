<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CSKHcu extends Model
{
    protected $table = 'callchamsockhachhangcu';
    protected $fillable = [
       'User ID', 'Mã Nhân Viên', 'Ngày Kế Hoạch', 'Kế Hoạch', 'Ngày Gọi', 'Tình Trạng Cuộc Gọi', 'Chương Trình Gọi',
        'Loại Thái Độ', 'PH Hài Lòng Về Chất Lượng H123', 'Lý Do Nghỉ', 'PH Có Thể Quay Lại Học', 'Thời Gian PH Nói Quay Lại',
        'Nội Dung Cuộc Gọi', 'Hotline'
    ];
    public $timestamps = false;
}
