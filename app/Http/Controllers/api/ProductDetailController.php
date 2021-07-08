<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductDetailController extends Controller
{
    //
    public function searchByID(Request $request){

        //input
        $checkRequest= $this->checkRequest($request);

        if($this->checkRequest($request) !=="Valid") return response()->json(['message' => "Error: ".$checkRequest]);

        //db
        
        //main

        $Product =DB::table('Product')->where('ProductID', $request->product_id)->get();
        $ProductOption =DB::table('ProductOption')->where('ProductID', $request->product_id)->get();

        //res

        return response()->json([
            "message"=>"ok",
            "product"=> $Product[0],
            "productOption"=> $ProductOption,
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
