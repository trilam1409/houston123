<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lophoc;

class LophocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if (Lophoc::get()->count() == 0){
            return response()->json(['code' => 401]);
        } else {
            $lophoc = Lophoc::join('danhsachmonhoc', 'lophoc.Mã Môn Học', '=', 'danhsachmonhoc.mamon')->join('giaovien', 'lophoc.Mã Giáo Viên', '=', 'giaovien.Mã Giáo Viên')
            ->join('coso', 'lophoc.branch', '=', 'coso.Cơ Sở')
            ->select('Mã Lớp', 'Lớp', 'lophoc.Mã Môn Học', 'danhsachmonhoc.name', 'lophoc.Mã Giáo Viên', 'giaovien.Họ Và Tên', 
            'Ngày Bắt Đầu', 'Ngày Kết Thúc', 'branch', 'coso.Tên Cơ Sở')->paginate(15);
            $custom = collect(['code' => 200]);
            $data = $custom->merge($lophoc);
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
            'lop' => 'required|string|max:10',
            'mamonhoc' => 'required|string',
            'magiaovien' => 'required|string',
            'batdau' => 'required|date_format:"d-m-Y"',
            'ketthuc' => 'required|date_format:"d-m-Y"',
            'coso' => 'required|string'
        ]);

        if (Lophoc::get()->count() == 0){
            $ma_lop = 'LH001';
        } else {
            $max = Lophoc::max('Mã Lớp');
            $ma_lop = str_pad(substr($max, -3) + 1, '5', 'LH000', STR_PAD_LEFT);
        }
        $lophoc = new Lophoc([
            'Mã Lớp' => $ma_lop,
            'Lớp' => $request->lop,
            'Mã Môn Học' => $request->mamonhoc,
            'Mã Giáo Viên' => $request->magiaovien,
            'Ngày Bắt Đầu' => date("Y-m-d", strtotime($request->batdau)),
            'Ngày Kết Thúc' => date("Y-m-d", strtotime($request->ketthuc)),
            'branch' => $request->coso
         ]);

         $lophoc->save();

         return response()->json(['code' => 200, 'message' => 'Tạo thành công'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($str)
    {
        $lophoc = Lophoc::where('Mã Lớp','like', '%'.$str.'%')->orwhere('Lớp','like','%'.$str.'%')->orwhere('lophoc.Mã Môn Học','like','%'.$str.'%')
        ->orwhere('lophoc.Mã Giáo Viên','like','%'.$str.'%')
        ->orwhere('Ngày Bắt Đầu','like','%'.$str.'%')->orwhere('Ngày Kết Thúc','like','%'.$str.'%')->orwhere('branch','like','%'.$str.'%');

        $result = $lophoc->join('danhsachmonhoc', 'lophoc.Mã Môn Học', '=', 'danhsachmonhoc.mamon')->join('giaovien', 'lophoc.Mã Giáo Viên', '=', 'giaovien.Mã Giáo Viên')
        ->join('coso', 'lophoc.branch', '=', 'coso.Cơ Sở')
        ->select('Mã Lớp', 'Lớp', 'lophoc.Mã Môn Học', 'danhsachmonhoc.name', 'lophoc.Mã Giáo Viên', 'giaovien.Họ Và Tên', 
        'Ngày Bắt Đầu', 'Ngày Kết Thúc', 'branch', 'coso.Tên Cơ Sở')->paginate(15);
     
        if ($lophoc->count() == 0){
            return response()->json(['code' => 401]);
        } else {
            $custom = collect(['code' => 200]);
            $data = $custom->merge($result);
            return response()->json($data)->header('charset','utf-8');
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
        $request->validate([
            'lop' => 'required|string',
            'mamonhoc' => 'required|string',
            'magiaovien' => 'required|string',
            'batdau' => 'required|date',
            'ketthuc' => 'required|date',
            'coso' => 'required|string'
        ]);

        if (Lophoc::where('Mã Lớp', $id)->count() == 0 ){
            return response()->json(['code' => 401, 'message' => 'Không tìm thấy'], 401);
        } else {
            Lophoc::where('Mã Lớp', $id)->update(['Lớp' => $request->lop, 'Mã Môn Học' => $request->mamonhoc, 'Mã Giáo Viên' => $request->magiaovien, 
            'Ngày Bắt Đầu' => date("Y-m-d", strtotime($request->batdau)), 'Ngày Kết Thúc' => date("Y-m-d", strtotime($request->ketthuc)), 
            'branch' => $request->coso]);
            return response()->json(['code' => 200, 'message' => 'Cập nhật thành công'], 200);
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
        $lophoc = Lophoc::where('Mã Lớp', $id);
        if ($lophoc->count() == 0){
            return response()->json(['code' => 401, 'message' => 'Không tìm thấy'], 401);
        } else {
            $lophoc->delete();
            return response()->json(['code' => 200, 'message' => 'Xóa thành công'], 200);
        }
    }
}
