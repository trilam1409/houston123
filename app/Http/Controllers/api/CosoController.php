<?php

namespace App\Http\Controllers\api;
use App\Coso;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CosoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if (Coso::get()->count() == 0){
            return response()->json(['code' => 401]);
        } else {
            $coso = Coso::paginate(15);
            $custom = collect(['code' => 200]);
            $data = $custom->merge($coso);
            return response()->json($data)->header('charset', 'utf-8');
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
            'macoso' => 'required|string',
            'tencoso' => 'required|string'
        ]);

        if (Coso::where('Cơ Sở',$request->macoso)->get()->count() == 0){
            $coso = new Coso([
                'Cơ Sở' => $request->macoso,
                'Tên Cơ Sở' => $request->tencoso
            ]);
            $coso->save();
            return response()->json(['code' => 200,'message' => 'Tao thanh cong'], 200);
        } else {
            return response()->json(['code' => 422, 'message' => 'Ton tai'], 422);
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
        $coso = Coso::where('Cơ Sở','like','%'.$str.'%')->orwhere('Tên Cơ Sở','like','%'.$str.'%');
        if($coso->count() == 0){
            return response()->json(['code' => 401],401);
        } else {
            $custom = collect(['code' => 200]);
            $data = $custom->merge($coso->paginate(15));
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
            'tencoso' => 'required|string'
        ]);
        $coso = Coso::where('Cơ Sở', $id);

        if($coso->count() == 0){
            return response()->json(['code' => 401, 'message' => 'Khong tim thay'], 401);
        } else{
            $coso->update(['Tên Cơ Sở' => $request->tencoso]);
            return response()->json(['code' => 200, 'message' => 'Cap nhat thanh cong'], 200);
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
        $coso = Coso::where('Cơ Sở', $id);
        if($coso->count() == 0){
            return response()->json(['code' => 401, 'message' => 'Khong tim thay'], 401);
        } else{
            $coso->delete();
            return response()->json(['code' => 200, 'message' => 'Xoa thanh cong'], 200);
        }
    }
}
