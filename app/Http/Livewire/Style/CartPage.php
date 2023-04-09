<?php

namespace App\Http\Livewire\Style;

use App\Models\Cart as ModelsCart;
use App\Models\CartItem;
use Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class CartPage extends Component
{
    use LivewireAlert;
    protected $listeners = [
        'cart_delete' => 'render',

//        'CartRowId' =>'submit'

    ];


    // public function deleteItem($rowId)
    // {
    //     Cart::instance('cart')->remove($rowId);
    //     if(Auth::check()){
    //         Cart::instance('cart')->store(Auth::user()->email);

    //     }
    //     // Cart::instance('cart')->search(function ($cartItem, $rowId) use ($id) {
    //     //     if ( $cartItem->id === $id) {
    //     //         return Cart::instance('cart')->remove($cartItem->rowId);

    //     //     }

    //     // });

    //     $this->alert('success', trans('user.cart_item_delete'), [
    //         'position' => session('lang')=='ar'? 'top-start':'top-end',
    //         'timer' => 3000,
    //         'toast' => true,
    //         'text' => '',
    //         'confirmButtonText' => 'Ok',
    //         'cancelButtonText' => 'Cancel',
    //         'showCancelButton' => false,
    //         'showConfirmButton' => false,
    //     ]);
    //     $this->emit('cart_updated');


    // }
    public function deleteItemCart($id)
    {
        // Cart::instance('cart')->remove($rowId);
        if(Auth::check()){

           $ckeck_id = CartItem::findOrFail($id);
           $count_card =CartItem::where('cart_id',$ckeck_id->cart_id)->get();



           //    dd($ckeck_cartid);

           if(count($count_card) > 1){
            //    dd('dele');
               CartItem::where('id',$id)->delete();


            }else{

                // $ckeck_id_with = CartItem::where('id',$id)->first();
                CartItem::where('id',$id)->delete();
                $ckeck_cartid= ModelsCart::where('id',$ckeck_id->cart_id)->first();

                $ckeck_cartid->delete();
                // dd($ckeck_cartid);

                // return redirect()->to('')

           }



            // Cart::instance('cart')->store(Auth::user()->email);

        }
        // Cart::instance('cart')->search(function ($cartItem, $rowId) use ($id) {
        //     if ( $cartItem->id === $id) {
        //         return Cart::instance('cart')->remove($cartItem->rowId);

        //     }

        // });

        $this->alert('success', trans('user.cart_item_delete'), [
            'position' => session('lang')=='ar'? 'top-start':'top-end',
            'timer' => 3000,
            'toast' => true,
            'text' => '',
            'confirmButtonText' => 'Ok',
            'cancelButtonText' => 'Cancel',
            'showCancelButton' => false,
            'showConfirmButton' => false,
        ]);
        $this->emit('cart_updated');


    }
    public function del_coupon(){
//        dd('detele coupon ');
        session()->forget('coupon');
        $this->emit('cart_updated');


        $this->alert('success', trans('user.coupon_delete'), [
            'position' => session('lang')=='ar'? 'top-start':'top-end',
            'timer' => 3000,
            'toast' => true,
            'text' => '',
            'confirmButtonText' => 'Ok',
            'cancelButtonText' => 'Cancel',
            'showCancelButton' => false,
            'showConfirmButton' => false,
        ]);

//        return redirect('ShoppingCart')->with('success_message','Coupon has been removed');
    }

//     public function saveForLater($id) {

//         // $item = Cart::get($id);
// // $cartSaveForLater=Cart::instance('saveForLater')->content();
// // $cartSaveForLater=Cart::content();

// foreach(Cart::instance('saveForLater')->content() as $item){

//     // dd( $id);
//     if ($item->id == $id) {
//         // dd('true');
//         $this->alert('error', 'Item is already Saved For Later!', [
//             'position' => 'top-start',
//             'timer' => 3000,
//             'toast' => true,
//             'text' => '',
//             'confirmButtonText' => 'Ok',
//             'cancelButtonText' => 'Cancel',
//             'showCancelButton' => false,
//             'showConfirmButton' => false,
//         ]);


//     }else{

//         dd('false');
//     }

// }




//         $duplicatesSave = Cart::instance('saveForLater')->content()->search(function ($cartItem, $rowId) use ($id) {
// // dd($cartItem);
//             return $rowId === $id;
//         });
//         // dd(Cart::instance('saveForLater')->search());
//         dd($duplicatesSave);
//         if ($duplicatesSave == false) {
//             // dd('false');
//             // dd('item alredy in save for leter');
//             $this->alert('error', 'Item is already Saved For Later!', [
//                 'position' => 'top-start',
//                 'timer' => 3000,
//                 'toast' => true,
//                 'text' => '',
//                 'confirmButtonText' => 'Ok',
//                 'cancelButtonText' => 'Cancel',
//                 'showCancelButton' => false,
//                 'showConfirmButton' => false,
//             ]);

//         }else{
//             // Cart::remove($id);

//             // dd('true');
//             Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)
//             ->associate('App\Models\Product');

//             $this->alert('success', 'Saved For Later!', [
//                 'position' => 'top-start',
//                 'timer' => 3000,
//                 'toast' => true,
//                 'text' => '',
//                 'confirmButtonText' => 'Ok',
//                 'cancelButtonText' => 'Cancel',
//                 'showCancelButton' => false,
//                 'showConfirmButton' => false,
//             ]);

//         // return redirect()->route('ShoppingCart.index')->with('success_message', 'Item has been Saved For Later!');
//         // Cart::search(function ($cartItem, $rowId) use ($id) {
//         //     if ( $cartItem->id === $id) {
//         //         return Cart::remove($cartItem->rowId);

//         //     }

//         // });

//         $this->emit('cart_updated');
//         $this->emit('cart_delete');
//         $this->emit('saveForLater');
//             // return redirect()->route('cart.index')->with('success_message', 'Item is already Saved For Later!');




//         }






    // }
    public function render()
    {
        if(ModelsCart::where('user_id',auth()->user()->id)->exists()){

            $cart_id=ModelsCart::where('user_id',auth()->user()->id)->firstOrFail();
            $cart_count_model = CartItem::where('cart_id',$cart_id->id)->count();
            $cart_items_model = CartItem::where('cart_id',$cart_id->id)->get();
// dd($cart_id);
        }else{
            $cart = new  ModelsCart();
            $cart-> id_cart =md5(uniqid(rand(), true));
            $cart-> key =md5(uniqid(rand(), true));
            $cart-> user_id =auth()->user()->id;
            $cart->save();


        $cart_count_model = CartItem::where('cart_id',$cart->id)->count();
        $cart_items_model = CartItem::where('cart_id',$cart->id)->get();

        }





        // $cart_count = Cart::instance('cart')->content()->count();
        // $cart_items = Cart::instance('cart')->content();



        return view('livewire.style.cart-page')->with([
            // 'cart_count'=>$cart_count,
            // 'cart_items'=>$cart_items,
            'cart_count_model'=>$cart_count_model,
            'cart_items_model'=>$cart_items_model,

            // 'discount' => session()->get('coupon')['discount'] ?? 0,
            // 'newSubtotal' => getNumbers()->get('newSubtotal'),
            // 'newTax' => getNumbers()->get('newTax'),
            // 'newTotal' => getNumbers()->get('newTotal'),
            // 'costDeli' => getNumbers()->get('costDeli'),


            'discount' => session()->get('coupon')['discount'] ?? 0,
            'newSubtotalModel' => getNumbersModels()->get('newSubtotal'),
            'sub' => getNumbersModels()->get('sub'),
            'newTaxModel' => getNumbersModels()->get('newTax'),
            'newTotalModel' => getNumbersModels()->get('newTotal'),
            'costDeliModel' => getNumbersModels()->get('costDeli')



        ]);
    }


}
