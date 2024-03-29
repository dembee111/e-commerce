<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\PrivateUserResource;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function action(LoginRequest $request)
    {
    	if (!$token = auth()->attempt($request->only('email', 'password'))) {
    		return response()->json([
                   'errors' => [
                       'email' => ['Хэрэглэгч эсвэл Нууц үг буруу байна']
                   ]
    		], 422);
    	}

    	return (new PrivateUserResource($request->user()))
    	     ->additional([
                 'meta' =>  [
                    'token' => $token
                 ]
    	     ]);
    }
}
