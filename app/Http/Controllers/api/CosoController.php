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
        $coso = Coso::paginate(15);
        return response()->json($coso,200);
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

        $coso = new Coso([
            'Cơ Sở' => $request->macoso,
            'Tên Cơ Sở' => $request->tencoso
        ]);

        $coso->save();
        return response()->json(['message' => 'Co So created successfully'], 200);
    }
        
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Coso::where('Cơ Sở','like','%'.$id.'%')->count() > 0 || Coso::where('Tên Cơ Sở','like','%'.$id.'%')->count() > 0){
            $coso = Coso::where('Cơ Sở','like','%'.$id.'%')->orwhere('Tên Cơ Sở','like','%'.$id.'%')->get();
            return response()->json($coso, 200);
        } else {
            return response()->json(['message' => 'No result'],201);
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

        if(Coso::where('Cơ Sở', $id)->count() == 1){
            Coso::where('Cơ Sở', $id)->update(['Tên Cơ Sở' => $request->tencoso]);
            return response()->json(['message' => 'Co So updated successfully'], 200);
        } else{
            return response()->json(['message' => 'Co So not exists'], 201);
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
        if(Coso::where('Cơ Sở', $id)->count() == 1){
            Coso::where('Cơ Sở', $id)->delete();
            return response()->json(['message' => 'Co So is deleted'], 200);
        } else{
            return response()->json(['message' => 'Co So not exists'], 201);
        }
    }
}
