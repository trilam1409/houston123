<?php

namespace App\Http\Controllers\api;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;
use App\Http\Controllers\Controller;

class UploadImage extends Controller
{
    public function upload(request $request){
        $request->validate([
            'image' => 'image'
        ]);



        $path = $request->file('image')->store('public/avatar_user');
        echo str_replace('public/avatar_user/','', $path);
    }
}
