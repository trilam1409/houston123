<?php

namespace App\Http\Controllers\api;
use App\ThongTinToRoi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ThongTinToRoiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(ThongTinToRoi::count() == 0){
            return response()->json(['code' => 401, 'message' => 'Không tìm thấy']);
        } else {
            $result = ThongTinToRoi::join('quanly', 'bangrontoroi.Mã Nhân Viên','=','quanly.Mã Quản Lý')->join('coso','bangrontoroi.Cơ Sở','=','coso.Cơ Sở')->select('bangrontoroi.*', 'coso.Tên Cơ Sở', 'quanly.Họ Và Tên')->paginate(15);
            $custom = collect(['code' => 200]);
            $data = $custom->merge($result);
            return response()->json($data)->header('charset','utf-8');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
