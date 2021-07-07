<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductDetailController extends Controller
{
    //
    public function searchByID(Request $request){

        $checkRequest= $this->checkRequest($request);

        if($this->checkRequest($request) !=="Valid") return response()->json(['message' => "Error: ".$checkRequest]);

        // $Product =DB::table('Product')->where('ProductName', 'like', '%'.$request->name.'%')->get();

        return response()->json([
            "message"=>"ok",
            // "product"=> $Product,
        ]);
    }

    public function checkRequest($request){

        if(!$this->validID($request)) return "Your URL not Found."; 

        return "Valid";

    }

    public function validID($request){
        
        $match = preg_match("/[0-9]/",$request->product_id);
        
        return $match;

    }
}
