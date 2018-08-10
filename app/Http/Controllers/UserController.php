<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    

    public function login(Request $request) {

    	$data = $request->validate([
    		"name" => "required",
    		"email" => "required",
    		"password" => "required"
    	]);



    	$user = User::where("email",$request->email)->first();


        if ( !isset($user)  || !Hash::check($request->password, $user->password) ) {
                return $this->errorResponse("Wrong Username or password",401);
        }


		$token = $user->createToken("myPersonaAccessClient")->accessToken;

		return $this->successResponse(["accessToken" => $token]);



    }



    public function register(Request $request){
    	

    	$data = $request->validate([
    		"name" => "required",
    		"email" => "required|unique:users",
    		"password" => "required"
    	]);

        $data["password"] = Hash::make($request->password);
        
    	$user = User::create($data);

    	$token = $user->createToken("myPersonaAccessClient")->accessToken;


    	return $this->successResponse(["accessToken" => $token]);


    }
}
