<?php

namespace App\Http\Livewire\Style;

use App\Models\Cart as ModelsCart;
use App\Models\CartItem;
use App\Models\Product;
use Cart;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CartInfo extends Component
{
    use LivewireAlert;
    public $item_id;
//    public $cart_rowId = '';



    protected $listeners = [
        'cart_updated' => 'render',
//        'CartRowId' =>'submit'

    ];



//    public function mount($posts)
//    {
////        foreach ($posts as $post ){
////
//////            dd($post);
////            $this->item_id = $post->id;
//////            $this->item_id = $post->rowId;
////        }
//////        $this->rowId = $item->rowId;
////////        dd($rowId);
//    }
    public function delete()
    {
        $this->post->delete();
    }
//
//    public function CartRowId($Row_id)
//    {
////$cart_shwow
////   dd($Row_id);
//    }


    public function deleteItem($id)
    {
////        dd(Cart::content());
//        $cart01=Cart::where('id',$id)->get('rowId');

// dd($id);

        // Cart::instance('cart')->search(function ($cartItem, $rowId) use ($id) {
        //     if ( $cartItem->id === $id) {
        //         return Cart::instance('cart')->remove($cartItem->rowId);

        //     }

        // });
        // Cart::instance('cart')->remove($rowId);
        // Cart::instance('cart')->store(Auth::user()->email);
        if(CartItem::where('id',$id)->exists()){
            $cart_delete= CartItem::findOrFail($id);
            $cart_delete->delete();

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
        $this->emit('cart_delete');
        }



    }



    public function render()
    {

// dd('faisal');

if(Auth::check()){


            if(ModelsCart::where('user_id',auth()->user()->id)->exists()){

                // $cart_count_model = CartItem::where('cart_id',$cart_id->id)->count();
                // $cart_items_model = CartItem::where('cart_id',$cart_id->id)->get();

                $cart_id=ModelsCart::where('user_id',auth()->user()->id)->firstOrFail();
                $sub =CartItem::where('cart_id',$cart_id->id)->sum('price');
                $cart_content=CartItem::where('cart_id',$cart_id->id)->get();
                $cart_count=CartItem::where('cart_id',$cart_id->id)->count();

            // dd('one');
            }else{
                // dd('two');
            $cart = new  ModelsCart();
            $cart-> id_cart =md5(uniqid(rand(), true));
            $cart-> key =md5(uniqid(rand(), true));
            $cart-> user_id =auth()->user()->id;
            $cart->save();
            $sub =CartItem::where('cart_id',$cart->id)->sum('price');
            $cart_content=CartItem::where('cart_id',$cart->id)->get();
            $cart_count=CartItem::where('cart_id',$cart->id)->count();



            // $cart_count_model = CartItem::where('cart_id',$cart->id)->count();
            // $cart_items_model = CartItem::where('cart_id',$cart->id)->get();

            }



            // $cart_id = ModelsCart::where('user_id',auth()->user()->id)->first();
            // sdd($cart_id);
            // $sub =CartItem::where('cart_id',$cart_id->id)->sum('price');
            // $cart_content=CartItem::where('cart_id',$cart_id->id)->get();
            // $cart_count=CartItem::where('cart_id',$cart_id->id)->count();


            // Cart::instance('cart')->restore(Auth::user()->email);
            // Cart::instance('saveForLater')->restore(Auth::user()->email);

            return view('livewire.style.cart-info', compact('cart_count','sub','cart_content'));
        }else{

            return view('livewire.style.cart-info');
        }

        // $cart_count = Cart::instance('cart')->content()->count();
    }

}
