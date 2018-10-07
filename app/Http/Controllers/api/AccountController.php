<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\account;
class AccountController extends Controller
{
    //
    public function show(){
        $account= account::paginate(15);
        return response()->json($account, 200);
    }
}
