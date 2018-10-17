<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Truongtiemnang extends Model
{
    protected $table = "truongtiemnang";
    protected $fillable = [
        "Tên Trường", "Địa Điểm", "Cơ Sở",
    ];

    public $timestamps = false;
}
