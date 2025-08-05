<?php

namespace App\Http\Controllers\api\v1;


use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthApiController extends Controller
{
    public function login (LoginRequest $request){
        $credentials = $request->only('email','password');

        $token = auth('api')->attempt($credentials);
        if(!$token){
            return response()->json(['message'=>'unauthorized access!'],401);
        }
        
        return response()->json([
    'access_token' => $token,
   
    'expires_in'=>auth('api')->factory()->getTTL()*60

    ],200);
    }
    public function refresh () {
        $refreshedToken = auth('api')->refresh(true,true);
        
        return response()->json([
            "refresh_token"=>$refreshedToken,
            'expires_in'=>auth('api')->factory()->getTTL()*60
        ]);
     }
    public function me(){
        $user = auth('')->user();
        return response()->json($user);
    }
    public function logout(){
        auth('api')->logout(true); 
        return response()->json(['message'=> 'logged out successfully'],200);

    }

    
}
