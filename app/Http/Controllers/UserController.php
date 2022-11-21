<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request){
        $data = $request->validate([
            'name'      =>  'required',
            'email'     =>  'required',
            'password'  =>  'required'
        ]);

        $data['password'] = bcrypt($request->password);

        $user = User::create($data);

        $token = $user->createToken('Access Token')->accessToken;

        return response(['user'=>$user,'token'=>$token]);
    }

    public function login(Request $request){
        $data = $request->validate([
            'email'     =>  'required',
            'password'  =>  'required'
        ]);

        if(!auth()->attempt($data)){
            return response(['message'=>'Invalid Details'],403);
        }

        $token = auth()->user()->createToken('Access Token')->accessToken;

        return response(['token'=>$token],200);
    }
}
