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
 
        if(Quanly::get()->count() == 0){
            return response()->json(['code' => '401', 'embeddata' => null],401);
       } else{
            $result = Quanly::join('coso', 'quanly.Cơ Sở', '=', 'coso.Cơ Sở')->select('quanly.*', 'coso.Tên Cơ Sở')->paginate(15);
            return response()->json(['code' => '200', 'embeddata' => $result], 200)->header('charset', 'utf-8');
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
       $quanly = Quanly::where('Mã Quản Lý','like','%'.$str.'%')->orWhere('Họ Và Tên','like','%'.$str.'%')->orWhere('quanly.Cơ Sở','like','%'.$str.'%');
  
       if($quanly->get()->count() == 0){
            return response()->json(['code' => '401', 'embeddata' => null],401);
       } else{
            $result = $quanly->join('coso', 'quanly.Cơ Sở', '=', 'coso.Cơ Sở')->select('quanly.*', 'coso.Tên Cơ Sở')->paginate(15);
            return response()->json(['code' => '200', 'embeddata' => $result], 200)->header('charset', 'utf-8');
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
        return response()->json(['code' => '200', 'message' => 'Cap nhat thanh cong'], 200);

        } else {
            return response()->json(['code' => '401', 'message' => 'Khong ton tai'], 401);
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
        if ($exist == 0){
            return response()->json(['code' => '401', 'message' => "Khong tim thay"], 401);
        } else if ($exist == 1){
            Quanly::where('Mã Quản Lý',$id)->delete();
            Account::where('account_id', $id)->delete();
            return response()->json(['code' => '200', 'message' => "Xoa thanh cong"], 200);
        }

    }
}
