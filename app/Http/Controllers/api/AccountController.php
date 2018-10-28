<?php
namespace App\Http\Controllers\api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Account;
use App\Quanly;
use App\Giaovien;
use App\Hocvien;
use App\Http\Controllers\Controller;
use Lcobucci\JWT\Parser;
use Illuminate\Support\Facades\Hash;
use DB;

class AccountController extends Controller
{
    
    public function register(Request $request)
    {
        $request->validate([
            // 'account_id' => 'required|string|max:2',
            'fullname' => 'required|string',
            'permission' => 'required|string',
            'khuvuc' => 'required|string',
            'loginID' => 'required|string|unique:account',
            'loginPASS' => 'required|string'
        ]);

        if($request->permission == 'giaovien'){
            $account_id = 'GV';
        } else {
            $account_id = 'QL';
        }

        if(Account::where('loginID',$request->loginId)->count() == 0){
            $acount_id_max = Account::select('account_id')->where('account_id','like', ''.$account_id.'%')->max('account_id');
            $account_id_new = str_pad(substr($acount_id_max,-4) + 1,'6',''.$account_id.'0000', STR_PAD_LEFT);
            $account = new Account([
                'account_id' => $account_id_new,
                'fullname' => $request->fullname,
                'permission' => $request->permission,
                'khuvuc' => $request->khuvuc,
                'loginID' => $request->loginID,
                'loginPASS' => bcrypt($request->loginPASS)
            ]);

            $account->save();
            $detail = Account::where('account_id',$account_id_new)->first();
            return response()->json(array('code' => 200, 'account_id' => $detail->account_id));
        } else {
            return response()->json(['code' => 422, 'message' => 'ID chi dinh da duoc su dung']);
        }
        
    }

    public function register_info(Request $request){
        $request->validate([
            'account_id' => 'required|string',
            'Mã Quản Lý' => 'unique:quanly',
            'available' => 'numeric',
            'hinhanh' => 'string',
            'loaiquanly' => 'string',
            'sdt' => 'required|string',
            'diachi' => 'required|string',
            'email' => 'email',
            'cmnd' => 'required|numeric'
        ]);

        if(QuanLy::where('Mã Quản Lý',$request->account_id)->count() >0){
            return response()->json(['code' => 422, 'message' => 'Tai khoan da ton tai']);
        } else  if(Giaovien::where('Mã Giáo Viên',$request->account_id)->count() >0){
            return response()->json(['code' => 422, 'message' => 'Tai khoan da ton tai']);
        } 

        $detail = Account::where('account_id',$request->account_id)->first();
        $type = substr($request->account_id,0,-4);
        if($type == 'QL'){
            $quanly = new Quanly([
                        'Mã Quản Lý' => $request->account_id,
                        'Họ Và Tên' => $detail->fullname,
                        'Hình Ảnh' => $request->hinhanh,
                        'Số Điện Thoại' => $request->sdt,
                        'Địa chỉ' => $request->diachi,
                        'Email' => $request->email,
                        'CMND' => $request->cmnd,
                        'Chức Vụ' => $request->loaiquanly,
                        'Cơ Sở' => $detail->khuvuc
                    ]);
                
            $quanly->save();
            $account = Account::where('account_id',$request->account_id)->update(['available' => $request->available, 'hinhanh' => $request->hinhanh,
         'loaiquanly' => $request->loaiquanly]);
        return response()->json(['code' => 200, 'message' => 'QL tao thanh cong']);
        } else if ($type == 'GV'){
            $giaovien = new Giaovien([
                'Mã Giáo Viên' => $request->account_id,
                'Họ Và Tên' => $detail->fullname,
                'Hình Ảnh' => $request->hinhanh,
                'Số Điện Thoại' => $request->sdt,
                'Địa Chỉ' => $request->diachi,
                'Email' => $request->email,
                'CMND' => $request->cmnd,
                'Cơ Sở' => $detail->khuvuc
            ]);

            $giaovien->save();
            $account = Account::where('account_id',$request->account_id)->update(['available' => $request->available, 'hinhanh' => $request->hinhanh,
         'loaiquanly' => $request->loaiquanly]);
        return response()->json(['code' => 200, 'message' => 'GV tao thanh cong']);
        } else{
            return response()->json(['code' => 400, 'message' => 'Error']);
        }

    }
    
    public function login(Request $request){
        $request->validate([
            'loginID' => 'required|string',
            'loginPASS' => 'required|string'
        ]);
        $pass_verify = Account::select('loginPASS')->where('loginID', $request->loginID)->first();
        if (!is_null($pass_verify)){
            if (!Hash::check($request->loginPASS, $pass_verify->loginPASS)) {
                return response()->json(['code' => 400, 'message' => 'Dang nhap that bai']);
            }
        } else{
            return response()->json(['code' => 401,'message' => "Tai khoan khong ton tai"]);
        }

        $account = Account::where('loginID', $request->loginID)->first();
        $account_id = Account::select('account_id')->where('loginID', $request->loginID)->first();
        $tokenResult = $account->createToken('Houston App')->accessToken;
        $id = (new Parser())->parse($tokenResult)->getHeader('jti');
        DB::table('oauth_access_tokens')->where('id', $id)->update(['user_id' => $account_id->account_id]);
        return response()->json(['code' => 200, 'token' => $tokenResult]);
    }

    public function logout(Request $request){   
        $value = $request->bearerToken();
        $id = (new Parser())->parse($value)->getHeader('jti');
        DB::table('oauth_access_tokens')->where('id', $id)->update(['revoked' => true]);
        return response()->json(['code' => 200, 'message' => "Dang xuat thanh cong"]);
    }

    public function account(Request $request){
        $value = $request->bearerToken();
        $id = (new Parser())->parse($value)->getHeader('jti');
        if(DB::table('oauth_access_tokens')->where('id',$id)->count() == 1){
            $account_token = DB::table('oauth_access_tokens')->select('user_id', 'revoked')->where('id',$id)->first();
            if($account_token->revoked == 0){
                $account = Account::where('account_id',$account_token->user_id)->first();
                if( Giaovien::where('Mã Giáo Viên', $account_token->user_id)->count() == 1){
                    $giaovien = Giaovien::select('Số Điện Thoại', 'Địa Chỉ', 'Email', 'CMND','Ngày Nghỉ', 'Lý Do Nghỉ')->where('Mã Giáo Viên', $account_token->user_id)->first();
                    return response()->json(array([$account , $giaovien]), 200)->header('charset','utf-8');
                } else if (Quanly::where('Mã Quản Lý', $account_token->user_id)->count() == 1){
                    $quanly = Quanly::select('Số Điện Thoại', 'Địa Chỉ', 'Email', 'CMND', 'Chức Vụ', 'Ngày Nghỉ', 'Lý Do Nghỉ')->where('Mã Quản Lý', $account_token->user_id)->first();
                    return response()->json(array([$account , $quanly]), 200)->header('charset','utf-8');
                } 
            } else{
                return response()->json(['code' => 401, 'message' => 'Chuoi token da het han'], 401);
            }
        } else {
            return response()->json(['code' => 401, 'message' => 'Chuoi token khong ton tai'], 401);
        }
       
    }
    
    public function test(){
        $id = Hocvien::min('Lớp');
        echo $id . ' ';
        // $id_new = str_pad(substr($id, -5) + 1, '7', 'HT00000', STR_PAD_LEFT);
        // echo $id_new;

    }
}