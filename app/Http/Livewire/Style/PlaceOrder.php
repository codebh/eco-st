<?php

namespace App\Http\Livewire\Style;

use App\Models\Cart as ModelsCart;
use App\Models\CartItem;
use App\Models\CartOption;
use App\Models\Order;
use App\Models\Setting;
use Cart;
use Devsig\Paygcc\PaygccOrder;
use Devsig\Paygcc\V5\CreditCard;
use Devsig\Paygcc\V5\DebitCard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use PhpParser\Node\Stmt\Break_;
use PhpParser\Node\Stmt\TryCatch;

class PlaceOrder extends Component
{

     public $discount;
     public $newSubtotal;
     public $newTax;
     public $newTotal;
     public $costDeli;
     public $code;
     public $orderSelect=[];
     public $deli = 0;
     public $cost;

     public
     $billing_email ,
     $billing_name,
     $billing_city,
     $billing_speical_direcstions
     ,$billing_phone,
     $delivery_method,
     $shipping_type,
     $shipping_type1,
     $billing_buliding,
     $billing_road,
    $billing_block,
    $billing_address,
    $billing_address1,
    $billing_province,
    $billing_country,
    $billing_postalcode;



    // public $order_id;
    // public $total;
    // public $customer_id;
    // public $cutomer_name;
    // // public array $transaction;

    // public $payment;
    public $payment_group = 1;
    // public $debitcard;


    //  public $name;

    //  public $deli= 2;





    public $city_id = '';
    public $cities = [
        1 => 'Bahrain delivery',
        2 => 'Other Country delivery',

    ];

    public function changeEvent($value)
    {

        $this->city_id = $value;
        $this->emit('render');


    }
    public $delivery_id = '';
    public $delivery_types = [
        1 => 'التوصيل الجماعي',
        2 => 'التوصيل المنفرد',
//        3 => 'Ahmedabad'
    ];

    public function changeshipping($value)
    {


        $this->delivery_id = $value;
        // dd($this->delivery_id);

        if($this->city_id == 1){

            if($this->delivery_id == 1){

                $this->cost =Setting()->delivery_inside;
            }else{


                $cart_id = ModelsCart::where('user_id',auth()->user()->id)->first();
                $this->cost = CartItem::where('cart_id',$cart_id->id)->count()* 1;
                // $this->cost = Cart::instance('cart')->content()->count()* 0.900;

            }
            $this->emit('render');

        }elseif($this->city_id == 2){


            // $this->cost = Cart::instance('cart')->content()->count()* 3.5;
            if($this->delivery_id == 1){
                $cart_id = ModelsCart::where('user_id',auth()->user()->id)->first();
                // $this->cost = CartItem::where('cart_id',$cart_id->id)->count()* Setting()->delivery_outside;
                switch(CartItem::where('cart_id',$cart_id->id)->count()){
                    case(1):
                        $this->cost = Setting()->delivery_outside;
                        break;
                    case(2):
                        $this->cost = 6.5;
                        break;
                    case(3):
                        $this->cost = 7.5;
                        break;
                    case(4):
                        $this->cost = 9;
                        break;
                    case(5):
                        $this->cost = 11;
                        break;
                    case(6):
                            $this->cost = 12.5;
                            break;
                    default:
                        $this->cost = 4.5;
                }



            }
            $this->emit('render');
        }
        // dd($this->delivery_id);



    }

    public function store(){


        // dd($this->city_id);
        // dd(request()->all());
        // dd(request()->all());



    //    dd( $this->code);
// $this->code;s
// $this->newSubtotal;
// $this->newTax;
//  $this->costDeli;
// $this->newTotal;
// return redirect()->to('/contact-form-success');
        if ($this->city_id == '') {
            $this->validate([
                'delivery_method' => 'required',
                'payment_group' => 'required',

            ],[], [
                'delivery_method' => trans('user.delivery_method'),
                // 'shipping_type' => trans('user.shipping_type'),


            ]);
        }
        elseif($this->city_id == 1){
            if ($this->shipping_type == null) {
                $this->validate([
                    'billing_email' => 'required|email',
                    'billing_name' => 'required',
                    'billing_phone' => 'required|numeric',
                    'billing_city' => 'required',
                    'billing_buliding'=>'required',
                    'billing_road'=>'required',
                    'billing_block'=>'required',
                    'payment_group' => 'required',

                    // 'shipping_type' => 'required',

                ],[],[
                    'billing_email'     =>  trans('user.email'),
                    'billing_name'      =>  trans('user.name'),
                    'billing_phone'     =>  trans('user.phone'),
                    'billing_city'      =>  trans('user.city'),
                    'billing_buliding'  => trans('user.buliding'),
                    'billing_road'      => trans('user.road'),
                    'billing_block'     => trans('user.block'),
                ]);
            }else{
                $this->validate([
                    'billing_email' => 'required|email',
                    'billing_name' => 'required',
                    'billing_phone' => 'required|numeric',
                    'billing_city' => 'required',
                    'billing_buliding'=>'required',
                    'billing_road'=>'required',
                    'billing_block'=>'required',
                    'payment_group' => 'required',

                    // 'shipping_type' => 'required',
                ],[],[
                    'billing_email'     =>  trans('user.email'),
                    'billing_name'      =>  trans('user.name'),
                    'billing_phone'     =>  trans('user.phone'),
                    'billing_city'      =>  trans('user.city'),
                    'billing_buliding'  => trans('user.buliding'),
                    'billing_road'      => trans('user.road'),
                    'billing_block'     => trans('user.block'),
                ]);
            }

        }
        elseif($this->city_id == 2){
            $this->validate([
                'shipping_type1' => 'required',
                'billing_email' => 'required|email',
                'billing_name' => 'required',
                'billing_phone' => 'required|numeric',
                'billing_city' => 'required',
                'billing_address'=>'required',
                // 'billing_address1'=>'required',
                // 'billing_province' => 'required',
                'billing_country'=>'required',
                'billing_postalcode'=>'required|numeric',
                'payment_group' => 'required',

            ],[],[
                'billing_email'           => trans('user.email'),
                'billing_name'            => trans('user.name'),
                'billing_phone'           => trans('user.phone'),
                'billing_city'            => trans('user.city'),
                'billing_address'         => trans('user.address'),
                // 'billing_address1'        => trans('user.address'),
                // 'billing_province'        => trans('user.province'),
                'billing_country'         => trans('user.country'),
                'billing_postalcode'      => trans('user.postal_code'),
            ]);
        }










                $order = new Order();
                $order->billing_phone = $this->billing_phone;
                $order->billing_email = $this->billing_email;
                $order->billing_name =  $this->billing_name;
                $order->billing_city =  $this->billing_city;
                $order->delivery_type =  $this->delivery_id;
                if ($this->city_id == 1) {
                    $order->billing_buliding            = $this->billing_buliding;
                    $order->billing_road                = $this->billing_road;
                    $order->billing_block               = $this->billing_block;
                    $order->billing_speical_direcstions = $this->billing_speical_direcstions;
                    $order->shipped = $this->shipping_type;
                    $order->billing_country = 'bahrain';
                }else{
                    $order->billing_country      = $this->billing_country;
                    $order->billing_postalcode   = $this->billing_postalcode;
                    $order->billing_address      = $this->billing_address;
                    $order->billing_address2     = $this->billing_address1;
                    $order->shipped              = $this->shipping_type1;
                    $order->billing_province     = $this->billing_province;
                }

                    $order->billing_discount = $this->discount;
                    $order->billing_discount_code = $this->code;
                    $order->billing_subtotal = $this->newSubtotal;
                    $order->billing_tax = $this->newTax;
                    $order->billing_delivery = $this->costDeli;
                    $order->billing_total = $this->newTotal;
                    $order->user_id = auth()->user() ? auth()->user()->id : null;
                    // $order->error = $error;

                    $order->confirm = 'pending';

                    if ($this->payment_group == 1) {
                      $order->payment_gateway = 'Debit';
                    }elseif($this->payment_group == 2){
                        $order->payment_gateway = 'Credit';
                    }

                    $order->save();
                    $dataa = Crypt::encrypt($order->id);
                    // dd(c)
                    return $this->redirect(route('payment.store',$dataa));










    }



    public function render()
    {
        $tax = config('cart.tax') / 100;
        $this->discount = session()->get('coupon')['discount'] ?? 0;
        $this->code = session()->get('coupon')['name'] ?? null;


            $this->deli =$this->cost;

        $this->costDeli = $this->deli;
        $cart_id = ModelsCart::where('user_id',auth()->user()->id)->first();
        $this->newSubtotal = (CartItem::where('cart_id',$cart_id->id)->sum('price') - $this->discount);
        if ($this->newSubtotal < 0) {
            $this->newSubtotal = 0;
        }
        $this->newTax = $this->newSubtotal * $tax;
        $this->newTotal = $this->newSubtotal * (1 + $tax)+$this->costDeli;

        $cart_id = ModelsCart::where('user_id',auth()->user()->id)->first();
        return view('livewire.style.place-order',[
            'cart_count'=>CartItem::where('cart_id',$cart_id->id)->count(),
            'cart_content'=>CartItem::where('cart_id',$cart_id->id)->get(),
            // 'cart_content_options'=>CartOption::where('cartItem_id',$cart_id->id)->get(),
            'cart_subtotal'=>CartItem::where('cart_id',$cart_id->id)->sum('price'),

            // 'tax' => $this->tax,
            'discount' => $this->discount,
            // 'code' => $this->code,
            'newSubtotal' => $this->newSubtotal,
            'newTax' => $this->newTax,
            'newTotal' => $this->newTotal,
            // 'costDeli'=>$this->costDeli
        ]
    );
    }
}
