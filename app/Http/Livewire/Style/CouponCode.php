<?php

namespace App\Http\Livewire\Style;

use App\Jobs\Style\UpdateCouponJobs;
use App\Models\Cart as ModelsCart;
use App\Models\CartItem;
use App\Models\Coupon;
use Cart;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class CouponCode extends Component
{
    use LivewireAlert;
    public $coupon_code;

    protected function rules()
    {
        return [
            'coupon_code' => 'required'
        ];
    }


    public function store()
    {
        // coupon code add qty

        // dd(request()->all());
        $find_coupon = Coupon::where('code',$this->coupon_code)->first();

        if (!$find_coupon){
            $this->alert('error', trans('user.coupon_Invalid'), [
                'position' => session('lang')=='ar'? 'top-start':'top-end',
                'timer' => 3000,
                'toast' => true,
                'text' => '',
                'confirmButtonText' => 'Ok',
                'cancelButtonText' => 'Cancel',
                'showCancelButton' => false,
                'showConfirmButton' => false,
            ]);

        }else{
            if($find_coupon->end !== null){
                $coupon = Coupon::where('code',$this->coupon_code)
                ->where('qty', '>', 0)
                ->whereDate('end','>=', \Carbon\Carbon::now())
                ->first();
            }else{
                $coupon = Coupon::where('code',$this->coupon_code)
                ->where('qty', '>', 0)
                ->first();
            }
            if (!$coupon){
                            $this->alert('error', trans('user.coupon_Invalid'), [
                                'position' => session('lang')=='ar'? 'top-start':'top-end',
                                'timer' => 3000,
                                'toast' => true,
                                'text' => '',
                                'confirmButtonText' => 'Ok',
                                'cancelButtonText' => 'Cancel',
                                'showCancelButton' => false,
                                'showConfirmButton' => false,
                            ]);

                        }else {

                                $cart_id = ModelsCart::where('user_id',auth()->user()->id)->first();
                                $cart_price = CartItem::where('cart_id',$cart_id->id)->sum('price');

                                if($coupon->type =='fixed'){
                                    if($coupon->value> $cart_price){
                                        $this->alert('error', trans('user.coupon_Invalid'), [
                                            'position' => session('lang')=='ar'? 'top-start':'top-end',
                                            'timer' => 3000,
                                            'toast' => true,
                                            'text' => '',
                                            'confirmButtonText' => 'Ok',
                                            'cancelButtonText' => 'Cancel',
                                            'showCancelButton' => false,
                                            'showConfirmButton' => false,
                                        ]);
                                    }else{
                                    session()->put('coupon',[
                                        'name'=> $coupon->code,
                                        'discount'=> $coupon->discount(CartItem::where('cart_id',$cart_id->id)->sum('price')),
                                    ]);

                                    $this->emit('cart_delete');
                                    $this->alert('success', trans('user.coupon_applied'), [
                                        'position' => session('lang')=='ar'? 'top-start':'top-end',
                                        'timer' => 3000,
                                        'toast' => true,
                                        'text' => '',
                                        'confirmButtonText' => 'Ok',
                                        'cancelButtonText' => 'Cancel',
                                        'showCancelButton' => false,
                                        'showConfirmButton' => false,
                                    ]);
                                    $this->coupon_code = '';

                                    }

                                }else{


                                    session()->put('coupon',[
                                        'name'=> $coupon->code,
                                        'discount'=> $coupon->discount(CartItem::where('cart_id',$cart_id->id)->sum('price')),
                                    ]);

                                    $this->emit('cart_delete');
                                    $this->alert('success', trans('user.coupon_applied'), [
                                        'position' => session('lang')=='ar'? 'top-start':'top-end',
                                        'timer' => 3000,
                                        'toast' => true,
                                        'text' => '',
                                        'confirmButtonText' => 'Ok',
                                        'cancelButtonText' => 'Cancel',
                                        'showCancelButton' => false,
                                        'showConfirmButton' => false,
                                    ]);
                                    $this->coupon_code = '';
                                }
        }
        }

    }


    public function render()
    {
        return view('livewire.style.coupon-code');
    }
}
