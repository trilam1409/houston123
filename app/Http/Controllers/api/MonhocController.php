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
            return response()->json($data, 200)->header('charset','utf-8');
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
            'ma' => 'string',
            'ten' => 'required',
            'bophanquanly' => 'required'
        ]);

        
        $id = strtoupper(substr($request->ten, 0, 2));
        $name_count = Monhoc::where('name',$request->ten)->get()->count();
        $id_count = Monhoc::where('mamon',$id)->get()->count();
        if ($name_count == 1){
            return response()->json(['code' => 422, 'message' => "Môn {$request->ten} đã tồn tại"], 422);
        }
        else if ($id_count == 1 && $request->ma == null){
            return response()->json(['code' => 422, 'message' => "Mã {$id} đã tồn tại vui nhập mã môn"], 422);
        }
        else if ($name_count == 0 && $id_count == 0){
            $monhoc = new Monhoc([
                'mamon' => $id,
                'name' => $request->ten,
                'managerAllow' => $request->bophanquanly
            ]);

            $monhoc->save();
            //return response()->json(['code' => 200, 'message' => 'Tạo thành công'], 200);
            return $this->show($id);
        } else if($name_count == 0 && $id_count == 1 && $request->ma != null) {
            $monhoc = new Monhoc([
                'mamon' => strtoupper($request->ma),
                'name' => $request->ten,
                'managerAllow' => $request->bophanquanly
            ]);

            $monhoc->save();
            //return response()->json(['code' => 200, 'message' => 'Tạo thành công'], 200);
            return $this->show($request->ma);
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
            return response()->json(['code' => 401, 'message' => 'Không tìm thấy'], 401);
        } else {
            $monhoc = $monhoc->paginate(15);
            $custom = collect(['code' => 200]);
            $data = $custom->merge($monhoc);
            return response()->json($data, 200)->header('charset','utf-8');
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
            'ten' => 'string',
            'bophanquanly' => 'string'
        ]);
        $monhoc = Monhoc::where('mamon',$id);
        if ($monhoc->get()->count() == 1){
            $monhoc->update(['name' => $request->ten,'managerAllow' => $request->bophanquanly]);
            //return response()->json(['code' => 200, 'message' => 'Cập nhật thành công'], 200);
            return $this->show($id);
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
