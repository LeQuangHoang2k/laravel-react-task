<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    public $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $filters = request()->all();

        return ProductResource::collection($this->productRepository->getAll($filters));
    }
    
    public function show($id)
    {
        $product = $this->productRepository->find($id);

        if (!$product) {
            return response()->json(['error' => [
                'message' => 'Not found!'
            ]], 404);
        }

        return new ProductResource($this->productRepository->find($id));
        
        //CategoryId => category_id
        //Product => products
        {            
            'ProductID' => 'id',
            'ProductCategory' => 'category_name',
        }

        {
            price_per_unit
        }
    }





    //
    public function show(){

        $Product = DB::select('select * from Product');

        return response()->json([
            "message"=>"ok",
            "product"=>$Product,
        ]);
    }

    public function search(Request $request){

        //input
        
        $checkRequest= $this->checkRequest($request);

        if($this->checkRequest($request) !=="Valid") return response()->json(['message' => "Error: ".$checkRequest]);

        //db

        //main

        $Product =DB::table('Product')->where('ProductName', 'like', '%'.$request->name.'%')->get();

        //res
        
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
