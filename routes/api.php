<?php

use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
//Route::get('/products', function () {
////    return [
////        'products'=> \App\Models\Product::all(),
////        'orders'=>\App\Models\Order::all(),
////
////        ];
////    return  ProductResource(OrderProduct::all());
//
//
//
//});

    Route::get('/products', [\App\Http\Controllers\OrderApiController::class,'index']);
    Route::get('/products/{id}', [\App\Http\Controllers\OrderApiController::class,'show']);
    Route::put('/products/{id}', [\App\Http\Controllers\OrderApiController::class,'update']);

//Route::get('/json', function () {
//    $response = Http::get('https://jsonplaceholder.typicode.com/comments', [
////        'name' => 'Taylor',
//        'postId' => 1,
//    ]);
//    $products = collect(json_decode($response->getBody(), true));
//    echo $products;
////    $response->getBody();
////    dd($response);
//});



//    Route::post('/login', [\App\Http\Controllers\ApiAuthController::class,'login']);
Route::group(['middleware'=>['auth:sanctum']], function () {

//    Route::post('/logout', [\App\Http\Controllers\ApiAuthController::class,'logout']);

});
