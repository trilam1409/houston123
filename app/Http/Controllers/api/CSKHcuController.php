<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CSKHcu;
class CSKHcuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (CSKHcu::get()->count() == 0){
            return response()->json(['code' => 401]);
        } else {
            $cskh = CSKHcu::paginate(15);
            $custom = collect(['code' => 200]);
            $data = $custom->merge($cskh);
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
        $cskh = CSKHcu::where('User ID','like','%'.$str.'%')->orwhere('Mã Nhân Viên','like','$'.$str.'%');
        if ($cskh->count() == 0){
            return response()->json(['code' => 401]);
        } else {
            $cskh = $cskh->paginate(15);
            $custom = collect(['code' => 200]);
            $data = $custom->merge($cskh);
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
