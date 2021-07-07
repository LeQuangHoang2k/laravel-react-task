<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function show(){

        $Product = DB::select('select * from Product');

        return response()->json([
            "message"=>"ok",
            "product"=>$Product,
        ]);
    }

    public function search(Request $request){
        $checkRequest= $this->checkRequest($request);

        if($this->checkRequest($request) !=="Valid") return response()->json(['message' => "Error: ".$checkRequest]);

        $Product =DB::table('Product')->where('ProductName', 'like', '%'.$request->name.'%')->get();

        return response()->json([
            "message"=>"ok",
            "product"=> $Product,
        ]);
    }

    public function checkRequest($request){

        if(!$this->validName($request)) return "Your Text not valid."; 

        return "Valid";

    }

    public function validName($request){
        
        $match = preg_match("/[a-zA-Z0-9]/",$request->name);
        
        return $match;

    }
}
