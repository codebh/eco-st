<?php

namespace App\Http\Controllers\Style;

use App\Http\Controllers\Controller;
use App\Mail\Style\OrderPlaced;
use App\Mail\Style\StoreOrder;
use App\Models\Cart as ModelsCart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\SizeData;
use Devsig\Paygcc\PaygccOrder;
use Cart;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ThankyouController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        $order =Order::latest()->first();
//    echo($order->id);
//        $response = Http::get('http://eco-staging.test/webhook?order_id='.  $order->id,);
//        dd($response->json() );
////        dd($id);
//        $client = new \GuzzleHttp\Client();
//        $res = $client->request('GET', 'http://eco-staging.test/webhook?order_id='.$id);
//        $res->getStatusCode();
//// "200"
//        $res->getHeader('content-type')[0];
//// 'application/json; charset=utf8'
////    $res->getBody();
//        $products = collect(json_decode($res->getBody(), true));
//
//        dd($products);

//        $client = new Client(['base_uri' => 'http://eco-staging.test']);
//
//        $response = $client->request('POST', '/webhook', [
//                'order_id'=>$id
//            ]);
//
//        echo $response->getBody();



//        $order = DB::table('order_product')->latest()->first();
        if (!session()->has('success_message')){
            return redirect('/');
        }
//        dd($request->all());
        $order=DB::table('orders')->orderBy('id', 'DESC')->first();
            return view('style.thank')->with('order',$order);


//        return view('style.thank');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function webhook(Request $request) {
        Log::info('----------Webhook Response------------');
        Log::info($request->all());



    }


    public function debit_success(Request $request) {


        try {
            $transaction = new PaygccOrder();
            $order_id = $request->order_id; //shop’s order id
            $transaction = $transaction->setOrderId($order_id)->getTransactions();
            //          dd($transaction);
            //            if ($transaction->paymnet_requests == null) {
            //                echo "<h1>your not alows</h1>";
            //            }else{
            //                echo "<h1>Thank you ! Your Payment Success</h1>";
            //                echo "<pre>";
            //                var_dump($transaction);

                // ;
         foreach ( $transaction->paymnet_requests as $item){
             $data = $item->payment_response ;
            //  dd($data);
         }
            //                      dd($data);
         $order = Order::findOrFail($request->order_id);
         $order->confirm = 'yes';
         $order->transactionId = $data->transactionId;
         if ($data->Paid_by == 'Credit Card') {

         $order->invoice_id = $data->batch;
         }else{
         $order->invoice_id = $data->invoice_id;

         }
         if( $order->billing_discount_code !== null){
            $coupon = Coupon::where('code',$order->billing_discount_code)->first();
            $cou = Coupon::findOrFail($coupon->id);
                if($cou-> qty > 0){
                   $product_update = Coupon::where('id', $cou->id)->update(['qty' => $cou->qty - 1]);
                }

        }
         $order->save();


            if(ModelsCart::where('user_id',auth()->user()->id)->exists()){
                $cart_id=ModelsCart::where('user_id',auth()->user()->id)->firstOrFail();
                // $cart_count_model = CartItem::where('cart_id',$cart_id->id)->count();
                $cart_items_model = CartItem::where('cart_id',$cart_id->id)->get();


                foreach ($cart_items_model as $item) {
                if ($item->product->category_id == 1) {
                    $product = Product::find($item->product->id);
                    if ($product->qty > 0) {
                    $product_update = Product::where('id', $product->id)->update(['qty' => $product->qty - 1]);
                    }

                    $orderProduct = new OrderProduct();
                    $orderProduct->order_id =  $request->order_id;
                    $orderProduct->product_id = $item->product->id;
                    $orderProduct->store_id = $item->product->store_id;
                    $orderProduct->price =$item->price;
                    foreach ($item->cart_option()->get() as $cart_option){
                        $orderProduct->notes = $cart_option->notes;
                        $orderProduct->color = $cart_option->color;
                        $orderProduct->ab_size1 =  $cart_option->a_size1;
                        $orderProduct->ab_size2 =  $cart_option->a_size2;
                        $orderProduct->ab_size3 =  $cart_option->a_size3;
                        $orderProduct->ab_size4 =  $cart_option->a_size4;
                        $orderProduct->ab_size5 =  $cart_option->a_size5;
                        $orderProduct->ab_size6 =  $cart_option->a_size6;
                    }
                    $orderProduct->user_id = auth()->user()->id;

                    // if ($product->price_offer > 0 and $product->status == "active") {
                    //     $orderProduct->price = $item->model->price_offer;
                    // } else {
                    //     $orderProduct->price = $item->model->price;
                    // }


                    $orderProduct->confirm = 'yes';
                    $orderProduct->save();
                        Mail::queue(new StoreOrder($orderProduct));
                        Mail::queue(new OrderPlaced($orderProduct));

                } elseif ($item->product->category_id == 2) {

                    $product = Product::find($item->product->id);
                    if ($product->qty > 0) {
                        $product_update = Product::where('id', $product->id)->update(['qty' => $product->qty - 1]);
                    }
                    $orderProduct = new OrderProduct();
                    $orderProduct->order_id =  $request->order_id;
                    $orderProduct->product_id = $item->product->id;
                    $orderProduct->store_id = $item->product->store_id;

                    foreach ($item->cart_option()->get() as $cart_option){
                    $orderProduct->notes = $cart_option->notes;
                    $orderProduct->color = $cart_option->color;
                    }
                    $orderProduct->user_id = auth()->user()->id;
                    $orderProduct->price =$item->price;

                    // if ($product->price_offer > 0 and $product->status == "active") {
                    //     $orderProduct->price = $item->model->price_offer;
                    // } else {
                    //     $orderProduct->price = $item->model->price;
                    // }
                        $orderProduct->confirm = 'yes';
                        $orderProduct->save();
                        Mail::queue(new StoreOrder($orderProduct));
                        Mail::queue(new OrderPlaced($orderProduct));
                }else {
                    $product = Product::find($item->product->id);
                    foreach ($item->cart_option()->get() as $cart_option){
                    $size_qty=SizeData::where('product_id',$item->product->id)->where('size_data',$cart_option->de_size)->get();
                    if ($size_qty[0]->size_qty > 0) {
                    $sizeUpdat = SizeData::where('product_id',$item->product->id)->where('size_data',$cart_option->de_size)->update(['size_qty' => $size_qty[0]->size_qty - 1]);
                    }
                    }

                    $orderProduct = new OrderProduct();
                    $orderProduct->order_id =  $request->order_id;
                    $orderProduct->product_id = $item->product->id;
                    $orderProduct->store_id = $item->product->store_id;
                    foreach ($item->cart_option()->get() as $cart_option){
                    $orderProduct->notes = $cart_option->notes;
                    $orderProduct->color = $cart_option->color;
                    $orderProduct->de_size = $cart_option->de_size;
                    }
                    $orderProduct->user_id = auth()->user()->id;
                    // if ($product->price_offer > 0 and $product->status == "active") {
                    //     $orderProduct->price = $item->model->price_offer;
                    // } else {
                    //     $orderProduct->price = $item->model->price;
                    // }
                    $orderProduct->price = $item->price;
                    $orderProduct->confirm = 'yes';
                    $orderProduct->save();
                        Mail::queue(new StoreOrder($orderProduct));
                        Mail::queue(new OrderPlaced($orderProduct));
                }

                $cart_id->delete();
            }

        }



    // Cart::instance('cart')->destroy();
    // Cart::instance('cart')->store(Auth::user()->email);


    session()->forget('coupon');

    session()->flash('success_message', 'Thank you! Your Payment has been successfully accepted!');
    return redirect(route('thankyou.index'))->with('success_message','success Payment');


        } catch(Exception $e) {
//            $this->addToOrdersTables($request, $e->getMessage());
            return back()->withErrors('Error! ' . $e->getMessage());
        }
    }

    public function debit_failed(Request $request)
    {

//        return  redirect()
        try {
            $order_id = $request->order_id;
            $ordrs =Order::where('id',$order_id)->update(['confirm' => 'no']);
            return redirect(route('confirm.index'))->withErrors('Error!  your payment is failed');


        } catch (Exception $e) {
//            $this->addToOrdersTables($request, $e->getMessage());
            return back()->withErrors('Error! ' . $e->getMessage());
        }
//        echo "<h1>Payment Failed</h1>";
    }


    // public function Payment(Request $request) {

    // }
}
