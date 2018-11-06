<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DKmonhoc;
use App\Chuongtrinhbosung;
class DKmonhocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (DKmonhoc::get()->count() == 0) {
            return response()->json(['code' => 401]);
        } else {
            $dk = DKmonhoc::paginate(15);
            $custom = collect(['code' => 200]);
            $data = $custom->merge($dk);
            $myJSON = json_encode($data, JSON_UNESCAPED_UNICODE);
            return response(str_replace(array('\\', '"{', '}"', '"[', ']"', '{"0":', '"1":', '"2":', '"3":', '"4":', '"5":', '"6":', '"7":', '"8":', '"9":', '"10":','},"ngaydangky"'),
                array('', '{', '}', '[', ']','[', '', '', '', '', '', '', '', '', '', '', '],"ngaydangky"'),$myJSON))
                ->header('Content-Type','application/json')->header('charset','utf-8');
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
            'mahocvien' => 'required|max:10',
            'mamon1' => 'string',
            'mamon2' => 'string',
            'mamon3' => 'string',
            'mamon4' => 'string',
            'ngaydangky' => 'required|date'
        ]);

        $monhoc = array();
        
        for ($i = 1; $i <=4; $i++){
            if($request->{"mamon$i"} != null){
                array_push($monhoc, array('mamon' => $request->{"mamon$i"}));
            } 
        }
        $json = json_encode($monhoc, JSON_UNESCAPED_UNICODE);
        $dangky = new DKmonhoc([
            'User ID' => $request->mahocvien,
            'monhoc' => $json,
            'ngaydangky' => $request->ngaydangky
        ]);

        if ($dangky->save()){
            return response()->json(['code' => 200, 'message' => 'Đăng ký thành không']);
        } else {
            return response()->json(['code' => 401, 'message' => 'Đăng ký không thành công']);
        }
    }

    public function store_trongoi(Request $request)
    {
        $request->validate([
            'mahocvien' => 'required|max:10',
            'idchuongtrinh' => 'required|numeric',
            'ngaydangky' => 'required|date'
        ]);



        //$json = json_encode($monhoc, JSON_UNESCAPED_UNICODE);
        $dangky = new DKmonhoc([
            'User ID' => $request->mahocvien,
            'monhoc' => $request->idchuongtrinh,
            'ngaydangky' => $request->ngaydangky
        ]);

        if ($dangky->save()){
            return response()->json(['code' => 200, 'message' => 'Đăng ký thành công']);
        } else {
            return response()->json(['code' => 401, 'message' => 'Đăng ký không thành công']);
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
        $dk = DKmonhoc::where('ID','like','%'.$str.'%')->orwhere('User ID','like','%'.$str.'%')->orwhere('monhoc', 'like','%'.$str.'%');
        if ($dk->count() == 0) {
            return response()->json(['code' => 401]);
        } else {
            $custom = collect(['code' => 200]);
            $data = $custom->merge($dk->paginate(15));
            $myJSON = json_encode($data, JSON_UNESCAPED_UNICODE);
            return response(str_replace(array('\\', '"{', '}"', '"[', ']"', '{"0":', '"1":', '"2":', '"3":', '"4":', '"5":', '"6":', '"7":', '"8":', '"9":', '"10":','},"ngaydangky"'),
                array('', '{', '}', '[', ']','[', '', '', '', '', '', '', '', '', '', '', '],"ngaydangky"'),$myJSON))
                ->header('Content-Type','application/json')->header('charset','utf-8');
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
        $dk = DKmonhoc::where('ID',$id);
        if ($dk->count() == 0){
            return response()->json(['code' => 401, 'message' => 'Không tìm thấy']);
        } else {
            $dk->delete();
            return response()->json(['code' => 200, 'message' => 'Xóa thành công']);
        }
    }


}
