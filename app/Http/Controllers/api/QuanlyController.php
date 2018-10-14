<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Quanly;
use App\Account;
class QuanlyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quanly = Quanly::paginate(30);
        return response()->json($quanly, 200, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
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
       $quanly = Quanly::where('Mã Quản Lý',$str)->orWhere('Họ Và Tên','like','%'.$str.'%')->get();
        return response()->json($quanly, 200, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
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
            'hovaten' => 'nullable|string',
            'hinhanh' => 'nullable|string',
            'permission' => 'string',
            'available' => 'numeric',
            'sdt' => 'nullable|numeric',
            'diachi' => 'nullable|string',
            'email' => 'nullable|email',
            'cmnd' => 'numeric',
            'chucvu' => 'nullable|string',
            'ngaynghi' => 'nullable|date',
            'lydonghi' => 'nullable|string',
            'coso' => 'nullable|string'
        ]);

        if(Quanly::where('Mã Quản Lý',$id)->count() == 1){
            Quanly::where('Mã Quản Lý',$id)->update(['Họ Và Tên' => $request->hovaten, 'Hình Ảnh' => $request->hinhanh, 'Số Điện Thoại' => $request->sdt,
        'Địa Chỉ' => $request->diachi, 'email' => $request->email, 'CMND' => $request->cmnd, 'Chức Vụ' => $request->chucvu, 'Ngày Nghỉ' => $request->ngaynghi,
        'Lý Do Nghỉ' => $request->lydonghi, 'Cơ Sở' => $request->coso]);
        
        Account::where('account_id',$id)->update(['fullname' => $request->hovaten,'permission' => $request->permission, 'khuvuc' => $request->coso,
         'available' => $request->available, 'hinhanh' => $request->hinhanh, 'loaiquanly' => $request->chucvu]);
        return response()->json(['message' => 'Account updated sccessfully'], 200);

        } else {
            return response()->json(['message' => 'Account not exists'], 200);
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
        $exist = Quanly::where('Mã Quản Lý',$id)->count();
        if($exist == 0){
            return response()->json(['message' => "Account not exist"], 200);
        } else if ($exist == 1){
            Quanly::where('Mã Quản Lý',$id)->delete();
            Account::where('account_id', $id)->delete();
            return response()->json(['message' => "Account deleted successfully"], 200);
        }

    }
}
