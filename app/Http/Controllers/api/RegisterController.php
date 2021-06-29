<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request){
        echo("welcome to register");

       //input
        $check= $this->checkRequest($request);
        if(!$check) return;

       //check db

       //main

       //res
    }

    public function checkRequest($request){
        echo($request->formData);
    }
}
