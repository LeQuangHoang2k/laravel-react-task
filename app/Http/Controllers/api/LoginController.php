<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//jwt
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request){
        //input

        $checkRequest= $this->checkRequest($request);

        if($this->checkRequest($request) !=="Valid") return response()->json(['message' => "Error: ".$checkRequest]);
  
        //check db

        $checkExistAccount= $this->checkExistAccount($request);

        if($this->checkExistAccount($request) !=="registered") return response()->json(['message' => "Error: ".$checkExistAccount]);

        //main-jwt token

        $Account = DB::select('select AccountID,AccountEmail,AccountName,AccountPhone,AccountPictureURL,AccountRole from Account where AccountEmail = ?', [$request->email]);
        
        //res

        return response()->json(['message' => "success",'account'=>$Account[0]]);
    }

    public function checkRequest($request){

        if(!$this->validEmail($request)) return "Your Email not valid."; 

        if(!$this->validPassword($request)) return "Your Password not valid.";

        return "Valid";

    }

    public function checkExistAccount($request){

        $Account = DB::table('Account')->where("AccountEmail",$request->email)->first();

        if($Account===null) return "Not exist";

        if($Account->PasswordHash === NULL || $Account->PasswordHash === "" ){  
            return "Not registered";
        }

        if( ! Hash::check( $request->password , $Account->PasswordHash ) ){
            return "Not match";
        }


        return "registered";

    }

    public function validEmail($request){ 
        
        $email = $request->email;
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        return true;

    }

    public function validPassword($request){
        
        $match = preg_match("/[a-zA-Z0-9]/",$request->password);
        
        return $match;

    }

}
