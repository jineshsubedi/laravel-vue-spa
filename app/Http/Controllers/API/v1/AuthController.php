<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\API\BaseController;
use App\Http\Resources\AuthUserResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AuthController extends BaseController
{
    public function Login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (!$this->guard()->attempt($credentials)) {
            return response()->json([

                'message' => 'The provided credentials are incorrect.'
            ], 500);
        }
        $token = $this->guard()->user()->createToken('auth-token')->plainTextToken;
        if(\Config::get('app.env') == 'production')
        {
            $data = [
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => new AuthUserResource(Auth::user()),
            ];
        }else{
            $data = [
                'user' => Auth::user(),
            ];
        }
        
        return $this->sendSuccessResponse($data, 'User Logged In Successfully!');
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();
        $this->guard()->logout();
        
        return $this->sendSuccessResponse('', 'logged out successfully');
    }

    public function guard($guard = 'web')
    {
        return Auth::guard($guard);
    }

    public function authUser(Request $request)
    {
        return new AuthUserResource($request->user());
    }
}
