<?php

namespace App\Http\Livewire;

use Livewire\Component;


class Cart extends Component
{

 public $discount ;

//  public $newSubtotal;
// public $newTax;
// public $newTotal;
// public $costDeli;






//'' => getNumbers()->get('newSubtotal'),
//'' => getNumbers()->get('newTax'),
//'' => getNumbers()->get('newTotal'),
//'' => getNumbers()->get('costDeli')
    public function render()
    {   $cart_count = Cart::content()->count();
        return view('livewire.cart', compact('cart_count'));

    }
//    public function getNumbers()
//    {
//        $tax = config('cart.tax') / 100;
//        $discount = session()->get('coupon')['discount'] ?? 0;
//        $code = session()->get('coupon')['name'] ?? null;
//        $deli = 2;
//        $costDeli = ($deli - $discount);
//        $newSubtotal = (\Gloudemans\Shoppingcart\Facades\Cart::subtotal());
//        if ($newSubtotal < 0) {
//            $newSubtotal = 0;
//        }
//        $newTax = $newSubtotal * $tax;
//        $newTotal = $newSubtotal * (1 + $tax) + $costDeli;
////    $shop_id = (Cart::content());
////    $shop_id->shop_id;
//
//
//        return collect([
//            'tax' => $tax,
//            'discount' => $discount,
//            'code' => $code,
//            'newSubtotal' => $newSubtotal,
//            'newTax' => $newTax,
//            'newTotal' => $newTotal,
//            'costDeli' => $costDeli,
////        'shop_id'=>$shop_id
//
//        ]);
//    }
}
