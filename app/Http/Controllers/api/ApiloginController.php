<?php

namespace App\Http\Controllers\api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;

use Tymon\JWTAuth\Exceptions\JWTException;


use App\Models\User;
use JWTFactory;

use Validator;
use Response;

class ApiloginController extends Controller
{
	
	
    public function login(Request $request)
    {
    	$validator = Validator::make($request->all(),
    [
    'email' =>'required | string | email | max:255' ,
       'password' => 'required '
    ]);
    if($validator->fails()){
    	return response()->json(
    $validator->errors());
    }
    $credentials = $request->only('email' , 'password');
try {
if( !$token =JWTAuth::attempt($credentials ))
{
	return response()->json([
	'error' => 'invalid  username or password '
	] ,  [401]) ;  }
	
	}catch(JWTException $e){
		return  response()->json(['error' => 'could not create token'] ,  501);
		}
		return  response()->json(compact('token'));
		}
}
 