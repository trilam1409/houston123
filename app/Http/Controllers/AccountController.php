<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\account;
class AccountController extends Controller
{
    //
    public function show(){
        $account= account::all();
        return response()->json($account, 200);
    }
}
