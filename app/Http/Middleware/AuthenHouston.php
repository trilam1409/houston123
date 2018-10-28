<?php

namespace App\Http\Middleware;
use Lcobucci\JWT\Parser;
use DB;
use Closure;

class AuthenHouston
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        if ($request->header('Authorization') == null){
            return response()->json(['code' => 401, 'message' => 'Khong duoc chung thuc'], 401);
        }


        $value = $request->bearerToken();
        $id = (new Parser())->parse($value)->getHeader('jti');
        if(DB::table('oauth_access_tokens')->where('id',$id)->count() == 1){
            $account_token = DB::table('oauth_access_tokens')->select('user_id', 'revoked')->where('id',$id)->first();
            if($account_token->revoked == 0){
                return $next($request);
                
            } else{
                return response()->json(['code' => 401, 'message' => 'Chuoi token da het han'], 401);
            }
        } else {
            return response()->json(['code' => 401, 'message' => 'Chuoi token khong ton tai'], 401);
        }
       
        
    }
}
