<?php
namespace App\Http\Controllers\api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use App\Http\Controllers\Controller;
use Lcobucci\JWT\Parser;
use DB;

class UserController extends Controller
{
    
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $user->save();
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }



    public function login(Request $request){
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $credentials = request(['email', 'password']);

        if(!Auth::attempt($credentials)){
            return response()->json(['message' => 'Unauthorizes'], 401);
        }

        $user = Auth::user();
        $tokenResult = $user->createToken('Houston App')->accessToken;
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