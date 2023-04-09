<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ForntDeliveryController extends Controller
{
    //
    public function index(){

// dd();
$level= delivery()->user()->level;

    if($level =='1'){
        $orders =Order::where('confirm','yes')->get();
        // return view('delivery.welcome',compact('orders'));
    }
    elseif ($level =='2') {
        $orders =Order::where('confirm','yes')->where('billing_country','bahrain')->where('delivery_type','2')->get();
        // return view('delivery.welcome',compact('orders'));
    }
    elseif ($level =='3') {

        $orders =Order::where('confirm','yes')->where('billing_country','bahrain')->where('delivery_type','1')->get();

    }
    elseif ($level =='4') {
        $orders =Order::where('confirm','yes')->where('delivery_type','1')
        ->where(function ($q) {

            $q->where('billing_country','KSA')->orWhere('billing_country','UAE');
        })


        ->get();
    }
    return view('delivery.welcome',compact('orders'));


    }


    public function details($id){



        try {
            $order =Order::findOrFail(Crypt::decrypt($id));
            // dd($order);
            $items=OrderProduct::where('order_id',$order->id)->get();


            return view('delivery.details')->with([
                'order'=>$order,
                'items'=>$items,
                ]);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            // \Illuminate\Support\Facades\Artisan::call('cache:clear');
            return redirect()->back();
        }

    }

    public function updatedDetails(Request $request, $id){

$shipped =['shipped '=>$request->shipped];
        // OrderProduct::where('id',->update($shipped));
        // // dd($request->all());

        $order =OrderProduct::findOrFail(Crypt::decrypt($id));
        $order->shipped = $request->shipped;
        $order->save();
        return redirect()->back();
    }
}
