<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use DB;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = product::paginate(2);
        return response()->json($product,200);

        //all();
        //paginate(quantity);
        //sortBy('');
        //sortByDesc('');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        //
        $request->validate([
            'name' => 'required',
            'size' => 'required',
            'color' => 'required'
        ]);

        $product = new product([
            'name' => $request->name,
            'size' => $request->size,
            'color' => $request->color
        ]);

        $product->save();

        return response()->json(['message' => 'Successfully created prodcut'],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
        $product = product::find($id);
        return response()->json($product);
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
        $request->validate([
            'name' => "string",
            'size' => "string",
            'color' => "string"
        ]);


        $product = product::find($id);
        if($request->name){
            $product->name = $request->name;
        }
        if($request->size){
            $product->size = $request->size;
        };
        if($request->color){
            $product->color = $request->color;
        };
        $product->save();
        
        return response()->json($product);
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
        $product = product::find($id);
        $product->delete();
        return reponse()->json(['message' => 'Product was deleted'], 201);
    }
}
