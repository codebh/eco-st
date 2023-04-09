<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiAuthController extends Controller
{
    //


//    public function logout()
//    {
//        auth()->user()->tokens()->delete();
//        return[
//            'message'=>'Logged out'
//        ];
//    }
//
//    public function login(Request $request)
//    {
//        $fields = $request->validate([
//           'email'=>'required',
//           'password'=> 'required',
//        ]);
//
//        $user = User::where('email',$fields['email'])->first();
//
//        if (!$user || !Hash::check($fields['password'],$user->password)) {
//            return response([
//                'message' => 'Bad Creds'
//            ],401);
//        }
//        $token = $user->createToken('myapptoken')->plainTextToken;
//        $responce =[
//          'user'=>$user,
//          'token'=>$token
//        ];
//        return  response($responce,201);
//
//    }
}
