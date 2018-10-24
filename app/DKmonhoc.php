<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DKmonhoc extends Model
{
    protected $table = 'dangkimonhoc';
    protected $fillable = [
        'USER ID', 'monhoc', 'ngaydangky'
    ];

    public $timestamps = false;
    protected $hidden = [
        'ID'
    ];
}
