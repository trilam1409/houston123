<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Chuongtrinhbosung;

class ChuongtrinhbosungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Chuongtrinhbosung::get()->count() == 0){
            return response()->json(['code' => 401]);
        } else {
            $ctrinh = Chuongtrinhbosung::paginate(15);
            $custom = collect(['code' => 200]);
            $data = $custom->merge($ctrinh);
            $myJSON = json_encode($data, JSON_UNESCAPED_UNICODE);
            return response(str_replace(array('\\', '"{"0":', '}","Trọn Gói"', '"1":', '"2":', '"3":', '"4":', '"5":', '"6":', '"7":', '"8":', '"9":', '"10":'), 
                array('', '[', '],"Trọn Gói"', '', '', '', '', '', '', '', '', '', ''),$myJSON))
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
    public function show($str)
    {   
        $ctrinh = Chuongtrinhbosung::where('ID','like','%'.$str.'%')->orwhere('Tên Chương Trình','like','%'.$str.'%')->orwhere('Chương Trình Học','like','%'.$str.'%')
            ->orwhere('Cơ Sở','like','%'.$str.'%');
        if ($ctrinh->count() == 0){
            return response()->json(['code' => 401]);
        } else {
            $ctrinh = $ctrinh->paginate(15);
            $custom = collect(['code' => 200]);
            $data = $custom->merge($ctrinh);
            $myJSON = json_encode($data, JSON_UNESCAPED_UNICODE);
            return response(str_replace(array('\\', '"{"0":', '}","Trọn Gói"', '"1":', '"2":', '"3":', '"4":', '"5":', '"6":', '"7":', '"8":', '"9":', '"10":'), 
                array('', '[', '],"Trọn Gói"', '', '', '', '', '', '', '', '', '', ''),$myJSON))
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
        //
    }
}
