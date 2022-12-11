<?php

namespace App\Http\Controllers\Style;

use App\Http\Controllers\Controller;

use App\Jobs\Style\sendStoreEmail;
use App\Mail\Style\OrderPlaced;
use App\Mail\Style\StoreOrder;
use App\Models\Cart as ModelsCart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\SizeData;
use Devsig\Paygcc\PaygccOrder;
use Devsig\Paygcc\V5\CreditCard;
use Devsig\Paygcc\V5\DebitCard;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Mail;
use Tap\TapPayment\Facade\TapPayment;
use romanzipp\Seo\Facades\Seo;
use romanzipp\Seo\Services\SeoService;
use romanzipp\Seo\Structs\Title;
use romanzipp\Seo\Structs\Meta\Description;
use romanzipp\Seo\Structs\Link;
use romanzipp\Seo\Structs\Meta\OpenGraph;

class ConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        seo()->title(session('lang')=='ar'?
        'تفصيل | منصة تسوق اون لاين لعديد من محلات العبايات وملابس المحجبات والبدلات والجلابيات والفساتين '
        :'Tafseel | online shopping pltaform for multi-vendors of abayas, Hijab, dresses, jalabia, modest fashion and more.');
        seo()->description(session('lang')=='ar'?
        'متاجر أزياء توفر تصاميم فريدة لتشكيلة متنوعة من العبايات الخليجية وملابس المحجبات والبدلات العملية والجلابيات والفساتين.'
        :
        'Tafseel Fashion designers Provide unique designs of various collections of abayas, suits, jalabiyas, dresses, and modest clothing.'
            );

        seo()->addMany([
            // main icon
            Link::make()->rel('icon')->href(asset('img/s_logo.png')),
            Link::make()->rel('shortcut icon')->href(asset('img/s_logo.png')),

            Link::make()->rel('canonical')->href('https://tafseel.net/shops'),
            Link::make()->rel('alternate')->hreflang('x-default')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('ar')->href('https://tafseel.net'),

            OpenGraph::make()->property('title')->content(
            session('lang')=='ar'?
            'تفصيل | منصة تسوق اون لاين لعديد من محلات العبايات وملابس المحجبات والبدلات والجلابيات والفساتين '
            :
            'Tafseel | online shopping pltaform for multi-vendors of abayas, Hijab, dresses, jalabia, modest fashion and more.'
            ),
            OpenGraph::make()->property('site_name')->content('tafseel.net | تفصيل'),
            OpenGraph::make()->property('description')->content(
            session('lang')=='ar'?
            'متاجر أزياء توفر تصاميم فريدة لتشكيلة متنوعة من العبايات الخليجية وملابس المحجبات والبدلات العملية والجلابيات والفساتين.'
            :
            'Tafseel Fashion designers Provide unique designs of various collections of abayas, suits, jalabiyas, dresses, and modest clothing.'
        ),
            OpenGraph::make()->property('url')->content('https://tafseel.net/shops'),
            OpenGraph::make()->property('locale:locale')->content('en_us'),
            OpenGraph::make()->property('locale:alternate')->content('ar_ar'),
            OpenGraph::make()->property('type')->content('website')
        ]);

        $cart_id=ModelsCart::where('user_id',auth()->user()->id)->firstOrFail();
        // $cart_count_model = CartItem::where('cart_id',$cart_id->id)->count();
        // $cart_items_model = CartItem::where('cart_id',$cart_id->id)->get();

        if (count(CartItem::where('cart_id',$cart_id->id)->get()) > 0) {
            return view('style.chConfirm')->with([
                'discount'    => getNumbersModels()->get('discount'),
                'newSubtotal' => getNumbersModels()->get('newSubtotal'),
                'newTax'      => getNumbersModels()->get('newTax'),
                'newTotal'    => getNumbersModels()->get('newTotal'),
                'costDeli'    => getNumbersModels()->get('costDeli')
            ]);
        } else {
            return redirect('all-products');
        }


        // if (count(Cart::instance('cart')->content()) > 0) {
        //     return view('style.chConfirm')->with([
        //         'discount' => getNumbers()->get('discount'),
        //         'newSubtotal' => getNumbers()->get('newSubtotal'),
        //         'newTax' => getNumbers()->get('newTax'),
        //         'newTotal' => getNumbers()->get('newTotal'),
        //         'costDeli' => getNumbers()->get('costDeli')
        //     ]);
        // } else {
        //     return redirect('all-products');
        // }

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
// dd(url('webhook'));
// dd($request->all());
        try {
            $order = $this->addToOrdersTables($request, null);
            $transaction = new PaygccOrder();
            $order_id = $order->id; //shop’s order id
            $total = '0.100';
            // $currency='SAR';
            $customer_id = auth()->user()->id; //order customer id
            $cutomer_name = auth()->user()->name; //order customer name
            $transaction->setOrderId($order_id)->amount($total)->customer($customer_id, $cutomer_name);
            if ($request->payment_group == 1) {

                $debitcard = new DebitCard([
                    // 'http://10.147.19.237/webhook?order_id=' . $order_id,
                    // 'http://10.147.19.237/success_payment?order_id=' . $order_id
                    // 'http://10.147.19.237/failed_payment?order_id=' . $order_id
                    'webhook_url'           => url('webhook?order_id=' . $order_id),
                    'success_redirect_url'  => url('success_payment?order_id=' . $order_id),
                    'failed_redirect_url'   => url('failed_payment?order_id=' . $order_id)
                ]);
                $payment = $debitcard->process($transaction)->pay();
                return $payment->render_url();
            } elseif  ($request->payment_group == 2) {

                $creditcard = new CreditCard([
                    'cc_number' => 'xxxxxxxxxxxxxxxx', //credit card number
                    'expiry_month' => '06', //card expiry month DD format
                    'expiry_year' => '22', //card expiry year YY format
                    'cvv' => 'xxx', //card cvv
                    // 'webhook_url' => 'http://10.147.19.237/webhook?order_id=' . $order_id,
                    // 'success_url' => 'http://10.147.19.237/success_payment?order_id=' . $order_id,
                    // 'failed_url'  => 'http://10.147.19.237/failed_payment?order_id=' . $order_id,
                    'webhook_url' =>  url('webhook?order_id=' . $order_id),
                    'success_url' =>  url('success_payment?order_id=' . $order_id),
                    'failed_url'  =>  url('failed_payment?order_id=' . $order_id),

                    'save_token' => 0, // set 1 if you need to save a token for this card to be able to pay with it in second type below, 0 for not saving it
                ]);
                $payment = $creditcard->process($transaction)->pay();
                return $payment->render();
            }else {
//                abort(404);
                return redirect()->back()->with('error','not alllowd');
            }

        } catch (CardErrorException $e) {
//            dd($e->getMessage());
            $this->addToOrdersTables($request, $e->getMessage());
            return back()->withErrors('Error! ' . $e->getMessage());
        }




    }

    protected function addToOrdersTables($request, $error)
    {
// dd($request->shipping_type);
        $this->validate($request, [
            'billing_phone' => 'required',
            'billing_email' => 'required',
            'billing_name' => 'required',
            // 'billing_address' => 'required',
            'billing_city' => 'required',
            // 'billing_country' => 'required',
            // 'billing_province' => 'required',
            // 'billing_postalcode' => 'required',
            'delivery_method' => 'required',
            'shipping_type' => 'required',

        ], [], [
            'billing_phone' => trans('shop.billing_phone'),
            'billing_email' => trans('shop.billing_email'),
            'billing_name' => trans('shop.billing_name'),
            // 'billing_address' => trans('shop.billing_address'),
            'billing_city' => trans('shop.billing_city'),
            // 'billing_country' => trans('shop.billing_country'),
            // 'billing_province' => trans('shop.billing_province'),
            // 'billing_postalcode' => trans('shop.billing_postalcode'),
            'delivery_method' => trans('user.delivery_method'),
            'shipping_type' => trans('user.shipping_type'),

        ]);


        if ($request->delivery_method == 1) {
            // dd($request->delivery_method);
            $this->validate($request, [
                'billing_buliding'=>'required',
                'billing_road'=>'required',
                'billing_block'=>'required',


            ]);

        }else{
            // dd($request->delivery_method);
            $this->validate($request, [
                'billing_address'=>'required',
                'billing_address1'=>'required',
                 'billing_province' => 'required',
                'billing_country'=>'required',
                'billing_postalcode'=>'required',


            ]);

        }

        $order = new Order();
        $order->billing_phone = $request->billing_phone;
        $order->billing_email = $request->billing_email;
        $order->billing_name = $request->billing_name;
        $order->billing_city = $request->billing_city;

        // $order->billing_province = $request->billing_province;

        if ($request->delivery_method == 1) {
            $order->billing_buliding            = $request->billing_buliding;
            $order->billing_road                = $request->billing_road;
            $order->billing_block               = $request->billing_block;
            $order->billing_speical_direcstions = $request->billing_speical_direcstions;
            $order->shipped = $request->shipping_type;
            $order->billing_country = 'bahrain';
        }else{
            $order->billing_country = $request->billing_country;
            $order->billing_postalcode = $request->billing_postalcode;
            $order->billing_address = $request->billing_address;
            $order->billing_address2 = $request->billing_address1;
            $order->shipped = $request->shipping_type;
              $order->billing_province = $request->billing_province;
        }


        $order->billing_discount = $this->getNumbers()->get('discount');
        $order->billing_discount_code = $this->getNumbers()->get('code');
        $order->billing_subtotal = $this->getNumbers()->get('newSubtotal');
        $order->billing_tax = $this->getNumbers()->get('newTax');
        $order->billing_delivery = $this->getNumbers()->get('costDeli');
        $order->billing_total = $this->getNumbers()->get('newTotal');
        $order->user_id = auth()->user() ? auth()->user()->id : null;
        $order->error = $error;
        if ($error !== null) {
            $order->confirm = 'no';
        } else {
            $order->confirm = 'yes';

        }
        $order->save();



        return $order;



    }
// protected function decreaseQuqntities(){

//         foreach(Cart::content as $item){
// if($item->category_id == 1){

//     $product=Product::find($item->model->id);
//     // $product->update(['quan'])

// }

//  }
// }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getNumbers()
    {
        $tax = config('cart.tax') / 100;
        $discount = session()->get('coupon')['discount'] ?? 0;
        $code = session()->get('coupon')['name'] ?? null;
        $deli = 2;
        $costDeli = ($deli);
        $sub =number_format((float)Cart::instance('cart')->subtotal(), 2);
        $newSubtotal = ($sub - $discount);
        if ($newSubtotal < 0) {
            $newSubtotal = 0;
        }
        $newTax = $newSubtotal * $tax;
        $newTotal = $newSubtotal * (1 + $tax) + $costDeli;
//    $shop_id = (Cart::content());
//    $shop_id->shop_id;


        return collect([
            'tax' => $tax,
            'discount' => $discount,
            'code' => $code,
            'newSubtotal' => $newSubtotal,
            'newTax' => $newTax,
            'newTotal' => $newTotal,
            'costDeli' => $costDeli,
//        'shop_id'=>$shop_id

        ]);
    }
}
