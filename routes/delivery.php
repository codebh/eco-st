<?php

use App\Http\Controllers\Delivery\DeliveryController;
use App\Http\Controllers\Delivery\ForntDeliveryController;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'delivery','namespace' =>'App\Http\Controllers\Delivery'], function () {
    Config::set('auth.defines','delivery');

    //    auth Route
    Route::get('login', [DeliveryController::class,'login']);
    Route::post('login', [DeliveryController::class,'dologin'])->name('delivery.login');

    Route::group(['middleware'=>'delivery:delivery'],function () {
        Route::any('/logout', [DeliveryController::class,'logout'])->name('delivery.logout');


        Route::get('/',[ForntDeliveryController::class,'index'])->name('delivery.dashboard');
        Route::get('details/{id}',[ForntDeliveryController::class,'details'])->name('order.show');
        Route::post('details/{id}',[ForntDeliveryController::class,'updatedDetails'])->name('order.update');

        // Route::get('/', function () {
        //     $orders = OrderResource::collection(Order::all());
        //     // dd($orders);


        //     return view('delivery.welcome',compact('orders'));

        // })

        // Route::get('details/{id}', function ($id) {

        //     $order =Order::findOrFail(Crypt::decrypt($id));
        //     return view('delivery.details',compact('order'));
        // })->name('order.show');


    });


});
