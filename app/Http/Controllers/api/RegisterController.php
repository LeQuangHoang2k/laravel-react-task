<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Account;
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

        if($this->checkRequest($request) !=="Valid") return response()->json(['message' => $checkRequest]);
  
        //check db

        $checkExistAccount= $this->checkExistAccount($request);

        if($this->checkExistAccount($request) ==="registered") return response()->json(['message' => $checkExistAccount]);

        //main

        if($this->checkExistAccount($request) ==="Not exist") {
            $this->createAccount($request);
        }

        else{
            $this->updateAccount($request);
        }

        //res
        
        return response()->json(['message' => "success",'data'=> "từ từ"]);
    }

    public function checkRequest($request){

        if(!$this->validEmail($request)) return "Your Email not valid."; 

        if(!$this->validPhone($request)) return "Your Phone not valid.";

        if(!$this->validPassword($request)) return "Your Password not valid.";

        if(!$this->validConfirmPassword($request)) return "Your Confirm Password not valid.";     

        return "Valid";

    }

    public function checkExistAccount($request){

        $Account = DB::table('Account')->where("AccountEmail",$request->email)->first();

        if($Account===null) return "Not exist";

        if($Account->PasswordHash === NULL || $Account->PasswordHash === "" ){  
            return "Not registered";
        }

        return "registered";

    }
    
    public function createAccount($request){

        DB::table("Account")->insert([
            "AccountEmail" => $request->email,
            "AccountPhone" => $request->phone,
            "PasswordHash" => $request->password,
            "AccountRole" => "user"
        ]); 

    }

    public function updateAccount($request){

        DB::table("Account")->update([
            "AccountPhone" => $request->phone,
            "PasswordHash" => $request->password,
        ]); 

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

        return $match;

    }

    public function validPassword($request){
        
        $match = preg_match("/[a-zA-Z0-9]/",$request->password);
        
        return $match;

    }

    public function validConfirmPassword($request){
        
        if($request->password !== $request->confirmPassword) return false;
        
        return true;

    }


}
