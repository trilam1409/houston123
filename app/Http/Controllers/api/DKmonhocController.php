<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DKmonhoc;

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
            return response()->json(['code' => '401', 'message' => 'Khong tim thay'], 200);
        } else {
            $dk = DKmonhoc::paginate(15);
            
            return response()->json(['code' => '200', 'embeddata' => $dk])->header('charset' , 'utf-8');
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
            'monhoc1' => 'required|string',
            'monhoc2' => 'string',
            'monhoc3' => 'string',
            'sl1' => 'required|string',
            'sl2' => 'string',
            'sl3' => 'string',
            'ngaydangky' => 'required|date'
        ]);

        // $monhoc = array(array('mamon' => $request->monhoc[1]),
        //                 array('mamon'=> $request->monhoc[2])
        //                 //array('mamon'=> $request->monhoc3)
        //             );
        $monhoc = array();
        for ($i = 1; $i <=3; $i++){
            if($request->{"monhoc$i"} != null){
                array_push($monhoc,array('mamon' => $request->{"monhoc$i"},'soluong' => $request->{"sl$i"}));
            }
        }

        printf(json_encode($monhoc));

        // $dangky = new DKmonhoc([
        //     'User ID' => $request->mahocvien,
        //     'monhoc' => json_encode($monhoc),
        //     'ngaydangky' => $request->ngaydangky
        // ]);

        // $dangky->save();
        // return response()->json(['code' => '200', 'message' => 'Tao thanh cong'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dk = DKmonhoc::where('monhoc', 'like','%'.$id.'%')->paginate(15);
 
        return response()->json(['code' => '200', 'embeddata' => $dk])->header('charset' , 'utf-8');
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
        DKmonhoc::where('ID',$id)->delete();
    }
}
