<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coso extends Model
{   
    protected $table = 'coso';
    protected $fillable = [
        'Cơ Sở', 'Tên Cơ Sở',
    ];

    public $timestamps = false;
}
