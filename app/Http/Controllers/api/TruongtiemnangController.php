<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Truongtiemnang;
use App\Http\Controllers\Controller;
class TruongtiemnangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if (Truongtiemnang::get()->count() == 0){
            return response()->json(['code' => '401', 'embeddata' => null], 401);
        } else {
            $truong = Truongtiemnang::join('coso', 'truongtiemnang.Cơ Sở','=','coso.Cơ Sở')->select('truongtiemnang.*', 'coso.Tên Cơ Sở')->paginate(15);
            return response()->json(['code' => '200', 'embeddata' => $truong])->header('charser','utf-8');
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
            'ten' => 'required',
            'diadiem',
            'coso' => 'required'
        ]);

        if (Truongtiemnang::where('Tên Trường',$request->ten)->get()->count() == 0 ){
            $truong = new Truongtiemnang([
                'Tên Trường' => $request->ten,
                'Địa Điểm' => $request->diadiem,
                'Cơ Sở' => $request->coso
            ]);

            $truong->save();
            return response()->json(['code' => '200', 'messsage' => 'Tao thanh cong'], 200);
        } else {
            return response()->json(['code' => '422', 'messsage' => 'Da ton tai'], 422);
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
        $truong = Truongtiemnang::where('Tên Trường','like','%'.$str.'%')->orwhere('truongtiemnang.Cơ Sở', 'like', '%'.$str.'%');
        if ($truong->get()->count() == 0){
            return response()->json(['code' => '401', 'embeddata' => null], 401);
        } else {
            $truong = $truong->join('coso', 'truongtiemnang.Cơ Sở','=','coso.Cơ Sở')->select('truongtiemnang.*', 'coso.Tên Cơ Sở')->paginate(15);
            return response()->json(['code' => '200', 'embeddata' => $truong])->header('charser','utf-8');
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
            'diadiem',
            'coso' => 'required'
        ]);

        $truong = Truongtiemnang::where('ID', $id);
        if ($truong->get()->count() == 0 ){
            return response()->json(['code' => '401', 'messsage' => 'Khong tim thay'], 401);
        } else {
            $truong->update(['Tên Trường' => $request->ten, 'Địa Điểm' => $request->diadiem, 'Cơ Sở' => $request->coso]);
            return response()->json(['code' => '200', 'messsage' => 'Cap nhat thanh cong'], 200);
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
        $truong = Truongtiemnang::where('ID', $id);
        if ($truong->get()->count() == 0 ){
            return response()->json(['code' => '401', 'messsage' => 'Khong tim thay'], 401);
        } else {
            $truong->delete();
            return response()->json(['code' => '200', 'messsage' => 'Xoa nhat thanh cong'], 200);
        }
    }
}
