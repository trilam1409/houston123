<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Hocvien;

class HocvienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if (Hocvien::get()->count() == 0) {
            return response()->json(['code' => 401, 'embeddata' => null], 401);
        } else {
            $user = Hocvien::join('coso', 'users.Cơ Sở', '=', 'coso.Cơ Sở')->select('users.*', 'coso.Tên Cơ Sở')->paginate(30);
            return response()->json(['code' => ' 200', 'embeddata' => $user], 200)->header('charset','utf-8');
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
            'hovaten' => 'required|string',
            'hinhanh' => 'nulable|string',
            'lop' => 'required|string',
            'sdt' => 'nullable|numeric',
            'diachi' => 'nulable|string',
            'ngaysinh' => 'nullable|date',
            'hoclucvao' => 'nullable|string',
            'ngaynhaphoc' => 'date',
            'truonghocchinh' => 'nullable|string',
            'hohang' => 'string',
            'tenNT1' => 'string',
            'ngheNT1' => 'string',
            'sdtNT1' => 'numeric',
            'tenNT2' => 'string',
            'ngheNT2' => 'string',
            'sdtNT2' => 'numeric',
            'lydobietHouson' => 'string',
            'chinhthuc' => 'numeric',
            'coso' => 'required|string'
        ]);

        $id = Hocvien::max('User ID');
        $id_new = str_pad(substr($id, -5) + 1, '7', 'HT00000', STR_PAD_LEFT);
        $hocvien = new Hocvien ([
            'User ID' => $id_new,
            'Họ Và Tên' => $request->hovaten,
            'Hình Ảnh' => $request->hinhanh,
            'Lớp' => $request->lop,
            'Số Điện Thoại' => $request->sdt,
            'Địa Chỉ' => $request->diachi,
            'Ngày Sinh' => $request->ngaysinh,
            'Học Lực Đầu Vào' => $request->hoclucvao,
            'Ngày Nhập Học' => $request->ngaynhaphoc,
            'Trường Học Chính Khóa' => $request->truonghocchinh,
            'Họ Hàng' => $request->hohang,
            'Họ Và Tên (NT1)' => $request->tenNT1,
            'Số Điện Thoại (NT1)' => $request->sdtNT1,
            'Nghê Nghiệp (NT1)' => $request->ngheNT1,
            'Họ Và Tên (NT2)' => $request->tenNT2,
            'Số Điện Thoại (NT2)' => $request->sdtNT2,
            'Nghê Nghiệp (NT2)' => $request->ngheNT2,
            'Biết Houston123 Như Thế Nào' => $request->lydobietHouson,
            'Chính Thức' => $request->chinhthuc,
            'Cơ Sở' => $request->coso
        ]);

        $hocvien->save();
        return response()->json('1', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($str)
    {   
        $hocvien = Hocvien::where('User ID','like','%'.$str.'%')->orwhere('Họ Và Tên', 'like','%'.$str.'%')->orwhere('users.Cơ Sở','like','%'.$str.'%');
        if ($hocvien->get()->count() == 0) {
            return response()->json(['code' => 401, 'embeddata' => null], 401);
        } else {
            $result = $hocvien->join('coso', 'users.Cơ Sở', '=', 'coso.Cơ Sở')->select('users.*', 'coso.Tên Cơ Sở')->paginate(30);
            return response()->json(['code' => ' 200', 'embeddata' => $result], 200)->header('charset','utf-8');
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
        $hocvien = Hocvien::where('User ID', $id);
        if($hociven->count() == 0){
            return response()->json(['code', 401, 'message' => 'Khong tim thay'],401);
            
        } else {
            $hociven->delete();
            return response()->json(['code', 200, 'message' => 'Xoa thanh cong'],200);
        }
        
    }
}
