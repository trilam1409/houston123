<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monhoc extends Model
{
    protected $table = 'danhsachmonhoc';

    protected $fillable = [
        'mamon', 'name', 'managerAllow',
    ];

    public $timestamps = false;
}
