<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $checkExistAccount= $this->checkExistAccount($request);

        if($this->checkExistAccount($request) !=="valid") return response()->json(['message' => $checkExistAccount]);

        //main

        $this->updateAccount($request);

        //res
        return response()->json(['message' => "success",'data'=> "từ từ"]);
    }

    public function checkRequest($request){

        if(!$this->validEmail($request)) return "Your Email not valid."; 

        if(!$this->validPhone($request)) return "Your Phone not valid.";

        if(!$this->validPassword($request)) return "Your Password not valid.";

        if(!$this->validConfirmPassword($request)) return "Your Confirm Password not valid.";     

        return "valid";

    }

    public function checkExistAccount($request){

        $Account = DB::table('Account')->where("AccountEmail",$request->email)->first();
        
        if($Account->PasswordHash !== NULL && $Account->PasswordHash !== "" ){
            return "Your account is registered";
        }

        return "valid";

    }
    
    public function updateAccount($request){

        $Account = DB::table('Account')->where("AccountEmail",$request->email)->update(
            [
                'AccountEmail' => $request->email,
                'AccountPhone' => $request->phone,
                'PasswordHash' => $request->pasword,
                'AccountRole' => "user",
                
            ]
        );

    }

    //
    public function validEmail($request){ 
        
        $email = $request->email;
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

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
