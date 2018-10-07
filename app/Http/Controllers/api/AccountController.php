<?php
namespace App\Http\Controllers\api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Account;
use App\Http\Controllers\Controller;
use Lcobucci\JWT\Parser;
use DB;

class AccountController extends Controller
{
    
    public function register(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string',
            'permission' => 'required|string',
            'khuvuc' => 'required|string',
            'available' => 'required|number',
            'hinhanh' => 'required|string',
            'loaiquanly' => 'string',
            'loginID' => 'string',
            'loginPASS' => 'string'
        ]);
        $account = new Account([
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

        $credentials = request(['loginID', 'loginPASS']);

        if(!Auth::attempt($credentials)){
            return response()->json(['message' => 'Unauthorizes'], 401);
        }

        $account = Auth::user();
        $tokenResult = $account->createToken('Houston App')->accessToken;
        return response()->json(['token' => $tokenResult], 200);
    }

    public function logout(Request $request){
        $value = $request->bearerToken();
        $id = (new Parser())->parse($value)->getHeader('jti');

        //DB::table('oauth_access_tokens')->where('id', $id)->update(['revoked' => true]);
        DB::table('oauth_access_tokens')->where('id', $id)->delete();
        return response()->json(['message' => "Loged out"]);
    }

    public function user(Request $request){
        return response()->json($request->user());

    }   

    
  
 
}