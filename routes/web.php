<?php

use App\Http\Controllers\api\FacebookController;
use App\Http\Controllers\api\GoogleController;
use App\Http\Controllers\api\LoginController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\RegisterController;
use App\Http\Controllers\api\ProductDetailController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/api/register', [RegisterController::class, 'register']);
Route::post('/api/login', [LoginController::class, 'login']);
Route::post('/api/login-facebook', [FacebookController::class, 'login']);
Route::post('/api/login-google', [GoogleController::class, 'login']);

Route::post('/api/show-product', [ProductController::class, 'show']);
Route::post('/api/search-product', [ProductController::class, 'search']);
Route::post('/api/search-product-detail', [ProductDetailController::class, 'searchByID']);


