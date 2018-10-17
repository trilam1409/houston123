<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loaiquanly extends Model
{
    protected $table = "loaiquanly";
    protected $fillable = [
        "Loại Quản Lý", "Permission Allow", "Permission", "Default CoSo,"
    ];

    public $timestamps = false;

    protected $hidden = [
        'Default CoSo',
    ];
}
