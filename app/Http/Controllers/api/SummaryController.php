<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class SummaryController extends Controller
{
    public function CSKHcu(){
        $temp = DB::table('callchamsockhachhangcu')->paginate(15);
        $custom = collect(['code' => 200]);
        $data = $custom->merge($temp);
        return response()->json($data)->header('charset','utf-8');
    }

    public function callHangNgay(){
        $temp = DB::table('calldangkyhangngay')->join('datadangkyhangngay','calldangkyhangngay.ID-DATA','=','datadangkyhangngay.ID')
        ->select('calldangkyhangngay.*','datadangkyhangngay.*')->paginate(15);
        $custom = collect(['code' => 200]);
        $data = $custom->merge($temp);
        return response()->json($data)->header('charset','utf-8');
    }

    
    public function callData(){
        $temp = DB::table('calldata')->join('data_truongtiemnang','calldata.ID-DATA','=','data_truongtiemnang.ID')
        ->select('calldata.*','data_truongtiemnang.*')->paginate(15);
        $custom = collect(['code' => 200]);
        $data = $custom->merge($temp);
        return response()->json($data)->header('charset','utf-8');
    }

    public function CSKH(){
        $temp = DB::table('chamsockhachhang')->paginate(15);
        $custom = collect(['code' => 200]);
        $data = $custom->merge($temp);
        return response()->json($data)->header('charset','utf-8');
    }

    public function DataTruongTiemNang(){
        $temp = DB::table('data_truongtiemnang')->paginate(15);
        $custom = collect(['code' => 200]);
        $data = $custom->merge($temp);
        return response()->json($data)->header('charset','utf-8');
    }

    public function DataDiTuVan(){
        $temp = DB::table('datadituvan')->paginate(15);
        $custom = collect(['code' => 200]);
        $data = $custom->merge($temp);
        return response()->json($data)->header('charset','utf-8');
    }

    public function TruongTiemNang(){
        $temp = DB::table('truongtiemnang')->paginate(15);
        $custom = collect(['code' => 200]);
        $data = $custom->merge($temp);
        return response()->json($data)->header('charset','utf-8');
    }

    
}
