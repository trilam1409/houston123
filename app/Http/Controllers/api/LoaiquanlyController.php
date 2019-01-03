<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LoaiQuanLy;
class LoaiquanlyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if (Loaiquanly::get()->count() == 0 ){
            return response()->json(['code' => 401]);
        } else {
            $loaiql = Loaiquanly::paginate(15);
            $custom = collect(['code' => 200]);
            $data = $custom->merge($loaiql);
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
        $request->validate([
            'loaiquanly' => 'required|string',
            'permission_allow' => 'nullable|string',
            'permission' => 'required|string'

        ]);
        
        if(Loaiquanly::where('Loại Quản Lý', $request->loaiquanly)->count() == 0){
            $loaiql = new Loaiquanly([
                'Loại Quản Lý' => $request->loaiquanly,
                'Permission Allow' => $request->permission_allow,
                'Permission' => $request->permission
            ]);
            //'Default CoSo' not necessary
            $loaiql->save();
            //return response()->json(['code' => 200, 'message' => 'Tạo thành công'], 200);
            return $this->show($request->loaiquanly);
        } else {
            return response()->json(['code' => 422, 'message' => 'Đã tồn tại'], 422);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($str)
    {
        $loaiql = Loaiquanly::where('Loại Quản Lý','like','%'.$str.'%')->orwhere('Permission','like','%'.$str.'%');
        if ($loaiql->count() == 0){
            return response()->json(['code' => 401]);
        } else {
            $custom = collect(['code' => 200]);
            $data = $custom->merge($loaiql->paginate(15));
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
            'permission_allow' => 'nullable|string',
            'permission' => 'required|string'
        ]);
        $loaiql = Loaiquanly::where('Loại Quản Lý', $id);
        if ($loaiql->count() == 0) {
            return response()->json(['code' => 401, 'message' => 'Không tìm thấy'], 401);
        } else {
            $loaiql->update(['Permission Allow' => $request->permission_allow, 'Permission' => $request->permission]);
           //return response()->json(['code' => 200, 'message' => 'Cập nhật thành công'], 200);
           return $this->show($id);
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
        $loaiql = Loaiquanly::where('Loại Quản Lý', $id);
        if ($loaiql->count() == 0) {
            return response()->json(['code' => 401, 'message' => 'Không tìm thấy'], 401);
        } else {
            $loaiql->delete();
           return response()->json(['code' => 200, 'message' => 'Xóa thành công'], 200);
        }
        
    }
}
