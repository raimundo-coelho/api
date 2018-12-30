<?php

namespace IDEALE\Http\Controllers\Api;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use IDEALE\Http\Controllers\Controller;


class AuthController extends Controller
{
    use AuthenticatesUsers;

    public function login(Request $request)
    {
        $this->validateLogin($request);
        $credentials = $this->credentials($request);
        $token = \JWTAuth::attempt($credentials);
        return $this->responseToken($token);
    }

    private function responseToken($token)
    {
        //
        return $token ? response()->json([
            'name' => auth()->user()->name,
            'access_token' => $token
        ]) :
            response()->json([
                'message' => \Lang::get('auth.failed')
            ], 403);
    }

    public function logout(){
        \Auth::guard('api')->logout();
        return response()->json([],204); //No-content
    }

    public function refresh(){
        $token = \Auth::guard('api')->refresh();
        return ['access_token' => $token]; //No-content
    }
}