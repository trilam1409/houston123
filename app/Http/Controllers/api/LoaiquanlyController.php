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
        $loaiql = Loaiquanly::paginate(30);
        return response()->json($loaiql, 200)->header('charset','utf-8');
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
            return response()->json(1,200);
        } else {
            return response()->json(0,200);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        
        Loaiquanly::where('Loại Quản Lý', $id)->update(['Permission Allow' => $request->permission_allow,
         'Permission' => $request->permission]);

        return response()->json(1, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        if(Loaiquanly::where('Loại Quản Lý', $id)->count() == 1){
            Loaiquanly::where('Loại Quản Lý', $id)->delete();
            return response()->json(1, 200);
        } else {
            return response()->json(0, 200);
        }
        
    }
}
