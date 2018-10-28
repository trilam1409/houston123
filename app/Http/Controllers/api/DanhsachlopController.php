<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Danhsachlop;

class DanhsachlopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Danhsachlop::get()->count() == 0 ){
            return response()->json(['code' => 401, 'embeddata' => null], 401);
        } else {
            $ds = Danhsachlop::paginate(15);
            return response()->json(['code' => 200, 'embeddata' => $ds], 200)->header('charset','utf-8');
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
        $request->validate([
            'mahocvien' => 'required|string',
            'malop' => 'required|string',
            'malopchuyen',
            'thoigianchuyen' => 'nullable|date'
        ]);

        $ds = new Danhsachlop([
            'User ID' => $request->mahocvien,
            'Mã Lớp' => $request->malop,
            'Mã Lớp Chuyển' => $request->malopchuyen,
            'Thời Gian Chuyển' => $request->thoigianchuyen
        ]);

        $ds->save();

        return response()->json(['code' => 200, 'message' => 'Tao thanh cong'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($str)
    {   
        $ds = Danhsachlop::where('User ID', 'like', '%'.$str.'%')->orwhere('Mã Lớp','like','%'.$str.'%');
        if ($ds->get()->count() == 0 ){
            return response()->json(['code' => 401, 'embeddata' => null], 401);
        } else {
            $ds = $ds->paginate(15);
            return response()->json(['code' => 200, 'embeddata' => $ds], 200)->header('charset','utf-8');
        }
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
        $ds = Danhsachlop::where('ID',$id);
        if ($ds->get()->count() == 0 ){
            return response()->json(['code' => 401, 'message' => 'Khong tim thay'], 401);
        } else {    
            $request->validate([
                'mahocvien' => 'required|string',
                'malop' => 'require|string',
                'malopchuyen',
                'thoigianchuyen' => 'date'
            ]);
    
            $ds->update([
                'User ID' => $request->mahocvien,
                'Mã Lớp' => $request->malop,
                'Mã Lớp Chuyển' => $request->malopchuyen,
                'Thời Gian Chuyển' => $request->thoigianchuyen
            ]);
            return response()->json(['code' => 200, 'message' => 'Cap nhat thanh cong'],200);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ds = Danhsachlop::where('ID',$id);
        if ($ds->get()->count() == 0 ){
            return response()->json(['code' => 401, 'message' => 'Khong tim thay'], 401);
        } else {    
            $ds->delete();
            return response()->json(['code' => 200, 'message' => 'Xoa thanh cong'],200);
        }
    }
}
