<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use JWTFactory;
use JWTAuth;
use Validator;
use Response;

class ApiregisterController extends Controller
{
    public function regy(Request $request)
    {
    	$validator = Validator::make($request->all(),
    [
    'email' =>'required | string | email | max:255|        unique:users',
    'name'=>'required ',
       'password' =>'required',
    ]);
    if($validator->fails()){
    	return response()->json(
    $validator->errors());
    }
    User::create ([
    'email'=>$request->get('email'),
     'name'=>$request->get('name'),
'password'=>bcrypt($request->get('password'))   ]);
$user=User::first();
$token = JWTAuth::fromUser($user);
return Response()->json(compact('token'));  
    }
}
