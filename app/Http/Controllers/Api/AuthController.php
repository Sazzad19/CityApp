<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
 public function register(Request $request) {
    /* $validataeData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
        'address' => 'required|string|max:255',
        'phone_number' => 'required|numeric'
     ]);*/
     $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
        'address' => 'required|string|max:255',
        'phone_number' => 'required|numeric',
    ]);
    if ($validator->fails()) {
        return response()->json(['success' => false, 'message' => $validator->errors(), 'status' => 422]);
    }
     else{
     /*$validataeData['password'] = bcrypt($request['password']);
     $user = User::create($validataeData);*/
     $request['password'] = bcrypt($request['password']);
     $user = User::create($request->all());
     $accessToken = $user->createToken('authToken')->accessToken;
     return response(['success' => true, 'message'=>'You are Registered Successfully', 'user' => $user, 'access_token' => $accessToken]);
     }

 }
 public function login(Request $request) {
    $loginData = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
     ]);
     if(!auth()->attempt($loginData)){
         return response(['message' => 'Invalid Credentials']);
     }
     $accessToken = auth()->user()->createToken('authToken')->accessToken;
     return response(['user' => auth()->user(), 'access_token' => $accessToken]);
 }
}
