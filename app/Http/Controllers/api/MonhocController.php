<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Monhoc;

class MonhocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if (Monhoc::get()->count() == 0) {
            return response()->json(['code' => 401]);
        } else {
            $monhoc = Monhoc::paginate(15);
            $custom = collect(['code' => 200]);
            $data = $custom->merge($monhoc);
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
            'ma' => 'required|max:3',
            'ten' => 'required',
            'bophanquanly' => 'required'
        ]);

        if (Monhoc::where('mamon',$request->ma)->get()->count() == 0){
            $monhoc = new Monhoc([
                'mamon' => $request->ma,
                'name' => $request->ten,
                'managerAllow' => $request->bophanquanly
            ]);

            $monhoc->save();
            return response()->json(['code' => 200, 'message' => 'Tạo thành công'], 200);
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
        $monhoc = Monhoc::where('mamon','like','%'.$str.'%')->orwhere('name','like','%'.$str.'%')->orwhere('managerAllow','like','%'.$str.'%');
        if ($monhoc->get()->count() == 0) {
            return response()->json(['code' => 401]);
        } else {
            $monhoc = $monhoc->paginate(15);
            $custom = collect(['code' => 200]);
            $data = $custom->merge($monhoc);
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
            'ten' => 'required',
            'bophanquanly' => 'required'
        ]);
        $monhoc = Monhoc::where('mamon',$id);
        if ($monhoc->get()->count() == 1){
            $monhoc->update(['name' => $request->ten,'managerAllow' => $request->bophanquanly]);
            return response()->json(['code' => 200, 'message' => 'Cập nhật thành công'], 200);
        } else {
            return response()->json(['code' => 401, 'message' => 'Không tìm thấy'], 401);
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
        $monhoc = Monhoc::where('mamon',$id);
        if ($monhoc->get()->count() == 1){
            $monhoc->delete();
            return response()->json(['code' => 200, 'message' => 'Xóa thành công'], 200);
        } else {
            return response()->json(['code' => 401, 'message' => 'Không tìm thấy'], 401);
        }
    }
}
