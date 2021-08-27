<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends BaseController
{
    public function register(Request $request){
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if($user->save()) {

            $accessToken = $user->createToken('foodtoken')->accessToken;

            return $this->sendResponse($accessToken, 'User Created Successfully');
        }

        else {
            return $this->sendError('duplication or registration error', 400);
        }
    }


    public function login(Request $request){
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'This User does not exist, check your details'], 400);
        }

        $accessToken = auth()->user()->createToken('foodtoken')->accessToken;

        return $this->sendResponse(['user' => auth()->user(), 'access_token' => $accessToken], 200);
    }

    public function profile(){

    }


}
