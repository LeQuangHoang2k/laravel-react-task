<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GoogleController extends Controller
{
    public function login(Request $request){
        //input

        //check db
        // print_r($request->email);
        // return;
        $checkExistAccount= $this->checkExistAccount($request);
        
        if($checkExistAccount === "Not exist"){
            $this->createAccount($request);
        }
        
        if($checkExistAccount === "Not active"){
            $this->updateAccount($request);
        }


        //main - jwt token

        $Account = DB::select('select AccountID,AccountEmail,AccountName,AccountPhone,AccountPictureURL,AccountRole from Account where AccountEmail = ?', [$request->email]);
        
        //res

        return response()->json(['message' => "success",'account'=>$Account[0]]);
    }

    public function checkExistAccount($request){

        $Account = DB::table('Account')->where("AccountEmail",$request->email)->first();

        if($Account===null) return "Not exist";

        if($Account->PasswordHash === NULL || $Account->PasswordHash === ""|| $Account->GoogleID ==="" ){  
            return "Not active";
        }

        return "registered";

    }

    public function createAccount($request){

        DB::table("Account")->insert([
            "GoogleID" => $request->id,
            "AccountEmail" => $request->email,
            "AccountName" => $request->name,
            "AccountPictureURL" => $request->pictureURL,
            "AccountRole" => "user",
            'created_at' => Carbon::today()->toDateTimeString(),
        ]); 

    }

    public function updateAccount($request){
        $Account = DB::select('select AccountID,AccountEmail,AccountName,AccountPhone,AccountPictureURL,AccountRole from Account where AccountEmail = ?', [$request->email]);

        $newName=$Account[0]->AccountName;
        $newPictureURL=$Account[0]->AccountPictureURL;

        if($Account[0]->AccountName===""){
            $newName=$request->name;
        }

        if($Account[0]->AccountPictureURL===""){
            $newPictureURL=$request->pictureURL;
        }

        DB::table('Account')
                ->where('AccountEmail', $request->email)
                ->update([
                    'GoogleID' => $request->id,
                    'AccountName' => $newName,
                    'AccountPictureURL' => $newPictureURL,
                    'updated_at' => Carbon::today()->toDateTimeString(),
                ]);

    }
}
