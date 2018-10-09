<?php
namespace App\Http\Controllers\api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Account;
use App\Http\Controllers\Controller;
use Lcobucci\JWT\Parser;
use Illuminate\Support\Facades\Hash;
use DB;

class AccountController extends Controller
{
    
    public function register(Request $request)
    {
        $request->validate([
            'account_id' => 'required|string|max:2',
            'fullname' => 'required|string',
            'permission' => 'required|string',
            'khuvuc' => 'required|string',
            'available' => 'required|numeric',
            'hinhanh' => 'required|string',
            'loaiquanly' => 'string',
            'loginID' => 'string|unique:account',
            'loginPASS' => 'string'
        ]);
        $acount_id_max = Account::select('account_id')->where('account_id','like', ''.$request->account_id.'%')->max('account_id');
        $account_id_new = str_pad(substr($acount_id_max,-4) + 1,'6',''.$request->account_id.'0000', STR_PAD_LEFT);
        $account = new Account([
            'account_id' => $account_id_new,
            'fullname' => $request->fullname,
            'permission' => $request->permission,
            'khuvuc' => $request->khuvuc,
            'available' => $request->available,
            'hinhanh' => $request->hinhanh,
            'loaiquanly' => $request->loaiquanly,
            'loginID' => $request->loginID,
            'loginPASS' => bcrypt($request->loginPASS)
        ]);
        $account->save();
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }
    
    public function login(Request $request){
        $request->validate([
            'loginID' => 'required|string',
            'loginPASS' => 'required|string'
        ]);
        $pass_verify = Account::select('loginPASS')->where('loginID', $request->loginID)->first();
        if (!is_null($pass_verify)){
            if (!Hash::check($request->loginPASS, $pass_verify->loginPASS)) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }
        } else{
            return response()->json(['message' => "Account doesn't exist"], 401);
        }

        $account = Account::where('loginID', $request->loginID)->first();
        $account_id = Account::select('account_id')->where('loginID', $request->loginID)->first();
        $tokenResult = $account->createToken('Houston App')->accessToken;
        $id = (new Parser())->parse($tokenResult)->getHeader('jti');
        DB::table('oauth_access_tokens')->where('id', $id)->update(['user_id' => $account_id->account_id]);
        return response()->json(['token' => $tokenResult], 200);
    }

    public function logout(Request $request){
        $value = $request->bearerToken();
        $id = (new Parser())->parse($value)->getHeader('jti');
        DB::table('oauth_access_tokens')->where('id', $id)->update(['revoked' => true]);
        //DB::table('oauth_access_tokens')->where('id', $id)->delete();
        return response()->json(['message' => "Loged out"]);
    }

    public function account(Request $request){
        $value = $request->bearerToken();
        $id = (new Parser())->parse($value)->getHeader('jti');
        $account_token = DB::table('oauth_access_tokens')->select('user_id', 'revoked')->where('id',$id)->first();
        if($account_token->revoked == 0){
            $account = Account::where('account_id',$account_token->user_id)->first();
            return response()->json($account, 200, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
        } else{
            return response()->json(['message' => 'The access token provided is expired'], 401);
        }
    }   
}