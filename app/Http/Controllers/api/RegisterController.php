<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request){

        // echo("welcome to register");
        // print_r($request->json()->all());
        // print_r($request->email);

        //input

        $checkRequest= $this->checkRequest($request);

        if($this->checkRequest($request) !=="valid") return response()->json(['message' => $checkRequest]);
  
        //check db

       //main

       //res
        return response()->json(['message' => "success",'data'=>"từ từ mới có data"]);
    }

    public function checkRequest($request){

        if(!$this->validEmail($request)) return "Your Email not valid."; 

        if(!$this->validPhone($request)) return "Your Phone not valid.";

        if(!$this->validPassword($request)) return "Your Password not valid.";

        if(!$this->validConfirmPassword($request)) return "Your Confirm Password not valid.";     

        return "valid";

    }
    
    public function validEmail($request){ 
        
        // if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) return false;
        


        // print_r("a : " . $a);

        // $match = preg_match("/[0-9]/i",$request->phone);

        return true;

    }
    
    public function validPhone($request){
        
        $match = preg_match("/[0-9]/",$request->phone);

        // echo("match la : " . $match);

        return $match;

    }

    public function validPassword($request){
        
        $match = preg_match("/[a-zA-Z0-9]/",$request->password);
        
        // echo("match la : " . $match);

        return $match;

    }

    public function validConfirmPassword($request){
        
        if($request->password !== $request->confirmPassword) return false;
        
        return true;

    }


}
