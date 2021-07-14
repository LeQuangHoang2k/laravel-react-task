<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use ThirdParty;

class ThirdPartyController extends Controller
{
    public function login(Request $request)
    {

        // Sync account
       $user = (new ThirdParty())->syncAccountFB();

        // gen access token
       $token = auth()->login($user);

       return $this->respondWithToken($token);

        //$Account = DB::select('select AccountID,AccountEmail,AccountName,AccountPhone,AccountPictureURL,AccountRole from Account where AccountEmail = ?', [$request->email]);
        
        //res

        //return response()->json(['message' => "success",'account'=>$Account[0]]);
    }

    public function checkExistAccount($request){

        $Account = DB::table('Account')->where("AccountEmail",$request->email)->first();

        if($Account===null) return "Not exist";

        if($Account->PasswordHash === NULL || $Account->PasswordHash === "" || $Account->FacebookID === ""){  
            return "Not active";
        }

        return "registered";

    }

    public function createAccount($request){
        DB::table("Account")->insert([
            "FacebookID" => $request->id,
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
                    'FacebookID' => $request->id,
                    'AccountName' => $newName,
                    'AccountPictureURL' => $newPictureURL,
                    'updated_at' => Carbon::today()->toDateTimeString(),
                ]);

    }
}
