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
}
