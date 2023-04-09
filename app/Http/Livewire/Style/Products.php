<?php

namespace App\Http\Livewire\Style;

use App\Models\Cart as ModelsCart;
use App\Models\CartItem as ModelsCartItem;
use App\Models\CartOption;
use App\Models\OtherColor;
use App\Models\OtherData;
use App\Models\Product;
use App\Models\SizeAbaya;
use App\Models\SizeData;
use AWS\CRT\HTTP\Request;
use Carbon\Carbon;
use FontLib\Table\Type\post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;


class Products extends Component
{
    use AuthorizesRequests ;
    use LivewireAlert;
//    public $modelFormVisible = false;

    public $product_id;
    public $name;

    public $content;
    public $category_id;

    public $price;
    public $color_id;
    public $price_offer;
    public $status;
    public $show;
    public $post;
    public $a_size1;
    public $a_size2;
    public $a_size3;
    public $a_size4;
    public $a_size5;
    public $a_size6;
    public $a_color;
    public $b_color;
    public $de_size;
    public $stock;
    public $qty;
    public $size_chart;
    public $store_busy;


    public $notes;
    public $duplicates;
    public $sizes;

    //for multi steps
    public $p_colors = [];
    public $p_des_colors = [];
    public $s_colors = [];
    public $s_des_colors = [];
    public $currentStep = 1;
    public $maxStep = 1;
//    public $price = 0.00;
    public $adults = 0;
    public $children = 0;
    public $mun = 0;
    public $from_country = null;
    public $from_city = null;
    public $to_country = null;
    public $to_city = null;

//    public $cartCount;
public $size_abaya_count;
public $size_abaya;
public $mager=[0,2,3,4,5,6];
protected function rules()
{

}
    protected $stepRules = [

        1 => [
            'a_size1' => 'required|numeric',

        ],
        2 => [
            'a_size2' => 'required|numeric'
        ],
        3 => [
            'a_size3' => 'required|numeric',

        ],
        4 => [
            'a_size4' => 'required|numeric',

        ],
        5 => [
            'a_size5' => 'required|numeric'
        ],
        6 => [
            'a_size6' => 'required|numeric',

        ]
    ];


    public function mount($post)
    {
        $this->product_id = $post->id;
        // dd(SizeAbaya::where('product_id', $this->product_id)->count());
        $this->name = $post->title;
        $this->content = $post->content;
        $this->category_id = $post->category_id;
        $this->price_offer = $post->price_offer;
        $this->price = $post->price;
        $this->status = $post->status;
        $this->show = $post->show;
        $this->size_chart = $post->size_chart;
        $this->qty = $post->qty;
        $this->color_id = $post->color->name_en;
        $this->sizes = SizeData::where('product_id', $this->product_id)->where('size_qty', '>', '0')->get();

        $this->p_colors = OtherData::where('product_id', $this->product_id)->where('data_value', '1')->get();
        $this->p_des_colors = OtherData::where('product_id', $this->product_id)->where('data_value', '0')->get();
//        $this->cities = OtherColor::all()->groupBy('country_id')->toArray();
        $this->s_colors = OtherColor::where('product_id', $this->product_id)->where('color_show', '1')->get();
        $this->s_des_colors = OtherColor::where('product_id', $this->product_id)->where('color_show', '0')->get();
        $this->stock = $post->size_data()->where('size_qty','>',0)->get();
        $this->store_busy = $post->store->close;

        $this->size_abaya_count= SizeAbaya::where('product_id', $this->product_id)->count();
        $this->size_abaya=SizeAbaya::where('product_id', $this->product_id)->get();
        // $this->stock_with_product = $post->where('qty','>',0)->get();
//        $this->emit('cart_updated');
//        $this->emit('cart_delete');



    }


////    model Product;
//    public $product_id,$title,$content,$store_id,$category_id,$main_image,$price,$price_offer,$status;
////    data form anther tables;
//    public $store_name,$category_name,$images,$primary_colors,$secound_colors,$count_primary_colors,$count_secound_colors,$count_primary_colors_dis, $count_secound_colors_dis;
////    data form anther tables;
//    public function addModelTest($data)
//    {
//        dd(request());
//    }
//
//    public function mount()
//    {
////dd();
//        $this->findProduct();
//    }
//
//    public function findProduct()
//    {
//        $product = Product::where('title', $this->title)->firstOrFail();
//        $this->product_id = $product->id;
//        $this->title = $product->title;
//        $this->content = $product->content;
//        $this->store_id = $product->store_id;
//        $this->category_id = $product->category_id;
//        $this->main_image = $product->main_image;
//        $this->price = $product->price;
//        $this->price_offer = $product->price_offer;
//        $this->status = $product->status;
//
//
//        $this->store_name = $product->store->name;
//        $this->category_name = $product->category->name_en;
//        $this->images = $product->image_data()->get();
//        $this->primary_colors = $product->other_data()->get();
//        $this->secound_colors = $product->other_color()->get();
//        $this->count_primary_colors = $product->other_data()->where('data_value',1)->get();
//        $this->count_primary_colors_dis = $product->other_data()->where('data_value',0)->get();
//        $this->count_secound_colors = $product->other_color()->where('color_show',1)->get();
//        $this->count_secound_colors_dis = $product->other_color()->where('color_show',0)->get();
//
//    }
//
//    public function showCreateModal()
//    {
//
//        $this->modelFormVisible = true;
//    }
////    public function store()
////    {
////        dd(request()->all());
////    }
//
//    public $name;
//    public function showCreateModal()
//    {
//
//        $this->modelFormVisible = true;
//    }




    public function store()
    {
        // dd(request()->all())


        // dd(request()->all());
        if ($this->category_id !== 1 and $this->category_id !== 2 ) {
            Validator::make(
                ['de_size' => $this->de_size],
                ['de_size' => 'required'],
                ['required' => 'The :attribute field is required'],

        )->validate();
        }
        if( $car_old =ModelsCart::where('user_id',auth()->user()->id)->first() and count(ModelsCartItem::where('cart_id',$car_old->id)->get()) < 6){


            if ($this->category_id == 1) {


                foreach($this->size_abaya as $item){

                        if($item->size_abaya == 'a_size1'){
                            $this->alert('error', trans('user.a_size1'), [
                                'position' => session('lang')=='ar'? 'top-start':'top-end',
                                'timer' => 3000,
                                'toast' => true,
                                'text' => '',
                                'confirmButtonText' => 'Ok',
                                'cancelButtonText' => 'Cancel',
                                'showCancelButton' => false,
                                'showConfirmButton' => false,
                            ]);

                        }
                        elseif($item->size_abaya == 'a_size2'){
                            $this->alert('error', trans('user.a_size2'), [
                                'position' => session('lang')=='ar'? 'top-start':'top-end',
                                'timer' => 3000,
                                'toast' => true,
                                'text' => '',
                                'confirmButtonText' => 'Ok',
                                'cancelButtonText' => 'Cancel',
                                'showCancelButton' => false,
                                'showConfirmButton' => false,
                            ]);

                        }
                        elseif($item->size_abaya == 'a_size3'){
                            $this->alert('error', trans('user.a_size3'), [
                                'position' => session('lang')=='ar'? 'top-start':'top-end',
                                'timer' => 3000,
                                'toast' => true,
                                'text' => '',
                                'confirmButtonText' => 'Ok',
                                'cancelButtonText' => 'Cancel',
                                'showCancelButton' => false,
                                'showConfirmButton' => false,
                            ]);

                        }
                        elseif($item->size_abaya == 'a_size4'){
                            $this->alert('error', trans('user.a_size4'), [
                                'position' => session('lang')=='ar'? 'top-start':'top-end',
                                'timer' => 3000,
                                'toast' => true,
                                'text' => '',
                                'confirmButtonText' => 'Ok',
                                'cancelButtonText' => 'Cancel',
                                'showCancelButton' => false,
                                'showConfirmButton' => false,
                            ]);

                        }
                        elseif($item->size_abaya == 'a_size5'){
                            $this->alert('error', trans('user.a_size5'), [
                                'position' => session('lang')=='ar'? 'top-start':'top-end',
                                'timer' => 3000,
                                'toast' => true,
                                'text' => '',
                                'confirmButtonText' => 'Ok',
                                'cancelButtonText' => 'Cancel',
                                'showCancelButton' => false,
                                'showConfirmButton' => false,
                            ]);

                        }
                        elseif($item->size_abaya == 'a_size6'){
                              $this->alert('error', trans('user.a_size6'), [
                                'position' => session('lang')=='ar'? 'top-start':'top-end',
                                'timer' => 3000,
                                'toast' => true,
                                'text' => '',
                                'confirmButtonText' => 'Ok',
                                'cancelButtonText' => 'Cancel',
                                'showCancelButton' => false,
                                'showConfirmButton' => false,
                            ]);
                        }

                        $this->validate(
                            [$item->size_abaya => 'required|numeric'],
                        );


                    }
                    // dd("سسسسس");
                $userID =auth()->user()->id;
                if ($car_old =ModelsCart::where('user_id',$userID)->first()) {
                    ModelsCart::where('user_id',$userID)->update(['updated_at'=>Carbon::now()]);
                    $cart_item = ModelsCartItem::where('cart_id',$car_old->id)->where('product_id', $this->product_id)->first();
                    if (!$cart_item) {
                        $cartItem = new ModelsCartItem();
                        $cartItem->cart_id = $car_old->id;
                        $cartItem->product_id = $this->product_id;

                        if($this->price_offer > 0 and $this->status=='active'){
                            $cartItem->price = $this->price_offer;

                        }else{
                            $cartItem->price = $this->price;
                        }

                        $cartItem->qty = 1;
                        $cartItem->save();

                        $cartOption = new CartOption();
                        $cartOption->cartItem_id = $cartItem->id;

                        $cartOption->color =   $this->color_id;
                        $cartOption->notes =   $this->notes;

                        $cartOption->a_size1 = $this->a_size1 == null? 0:$this->a_size1 ;
                        $cartOption->a_size2 = $this->a_size2 == null? 0:$this->a_size2 ;

                        $cartOption->a_size3 = $this->a_size3 == null? 0:$this->a_size3 ;
                        $cartOption->a_size4 = $this->a_size4 == null? 0:$this->a_size4 ;

                        $cartOption->a_size5 = $this->a_size5 == null? 0:$this->a_size5 ;
                        $cartOption->a_size6 = $this->a_size6 == null? 0:$this->a_size6 ;

                        $cartOption->save();
                        $this->alert('success', trans('user.cart_add_product'), [
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
                        $this->a_color = '';
                        $this->b_color = '';
                        $this->a_size1 = '';
                        $this->a_size2 = '';
                        $this->a_size3 = '';
                        $this->a_size4 = '';
                        $this->a_size5 = '';
                        $this->a_size6 = '';
                    } else {
                        $this->alert('error', trans('user.cart_item_inside'), [
                            'position' => session('lang')=='ar'? 'top-start':'top-end',
                            'timer' => 3000,
                            'toast' => true,
                            'text' => '',
                            'confirmButtonText' => 'Ok',
                            'cancelButtonText' => 'Cancel',
                            'showCancelButton' => false,
                            'showConfirmButton' => false,
                        ]);
                    }
                }else{
                    $cart = new  ModelsCart();
                    $cart-> id_cart =md5(uniqid(rand(), true));
                    $cart-> key =md5(uniqid(rand(), true));
                    $cart-> user_id =auth()->user()->id;
                    $cart->save();
                    $cart_item = ModelsCartItem::where('cart_id',$cart->id)->where('product_id', $this->product_id)->first();
                    if (!$cart_item) {
                        $cartItem = new ModelsCartItem();
                        $cartItem->cart_id = $cart->id;
                        $cartItem->product_id = $this->product_id;
                        if($this->price_offer > 0 and $this->status=='active'){
                            $cartItem->price = $this->price_offer;
                        }else{
                            $cartItem->price = $this->price;
                        }
                        $cartItem->qty = 1;
                        $cartItem->save();

                        $cartOption = new CartOption();
                        $cartOption->cartItem_id = $cartItem->id;
                        $cartOption->color =   $this->color_id;
                        $cartOption->notes =   $this->notes;
                        $cartOption->a_size1 = $this->a_size1 ;
                        $cartOption->a_size2 = $this->a_size2 ;
                        $cartOption->a_size3 = $this->a_size3 ;
                        $cartOption->a_size4 = $this->a_size4 ;
                        $cartOption->a_size5 = $this->a_size5 ;
                        $cartOption->a_size6 = $this->a_size6 ;
                        $cartOption->save();

                        $this->alert('success', trans('user.cart_add_product'), [
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
                        $this->a_color = '';
                        $this->b_color = '';
                        $this->a_size1 = '';
                        $this->a_size2 = '';
                        $this->a_size3 = '';
                        $this->a_size4 = '';
                        $this->a_size5 = '';
                        $this->a_size6 = '';


                    } else {
                        $this->alert('error', trans('user.cart_item_inside'), [
                            'position' => session('lang')=='ar'? 'top-start':'top-end',
                            'timer' => 3000,
                            'toast' => true,
                            'text' => '',
                            'confirmButtonText' => 'Ok',
                            'cancelButtonText' => 'Cancel',
                            'showCancelButton' => false,
                            'showConfirmButton' => false,
                        ]);
                    }


                }

            } elseif ($this->category_id == 2) {
                $userID =auth()->user()->id;
                if ($car_old =ModelsCart::where('user_id',$userID)->first()) {
                    $cart_item = ModelsCartItem::where('cart_id',$car_old->id)->where('product_id', $this->product_id)->first();
                    ModelsCart::where('user_id',$userID)->update(['updated_at'=>Carbon::now()]);
                    if (!$cart_item) {
                        $cartItem = new ModelsCartItem();
                        $cartItem->cart_id = $car_old->id;
                        $cartItem->product_id = $this->product_id;
                        if($this->price_offer > 0 and $this->status=='active'){
                            $cartItem->price = $this->price_offer;

                        }else{
                            $cartItem->price = $this->price;
                        }

                        $cartItem->qty = 1;
                        $cartItem->save();

                        $cartOption = new CartOption();
                        $cartOption->cartItem_id = $cartItem->id;
                        $cartOption->color =   $this->color_id;
                        $cartOption->notes =   $this->notes;
                        $cartOption->save();
                        $this->alert('success', trans('user.cart_add_product'), [
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
                        return $this->redirect(route('ShoppingCart.index'));

                    } else {
                        $this->alert('error', trans('user.cart_item_inside'), [
                            'position' => session('lang')=='ar'? 'top-start':'top-end',
                            'timer' => 3000,
                            'toast' => true,
                            'text' => '',
                            'confirmButtonText' => 'Ok',
                            'cancelButtonText' => 'Cancel',
                            'showCancelButton' => false,
                            'showConfirmButton' => false,
                        ]);
                    }


                }else{
                    $cart = new  ModelsCart();
                    $cart-> id_cart =md5(uniqid(rand(), true));
                    $cart-> key =md5(uniqid(rand(), true));
                    $cart-> user_id =auth()->user()->id;
                    $cart->save();
                    $cart_item = ModelsCartItem::where('cart_id',$cart->id)->where('product_id', $this->product_id)->first();

                    if (!$cart_item) {
                        $cartItem = new ModelsCartItem();
                        $cartItem->cart_id = $cart->id;
                        $cartItem->product_id = $this->product_id;
                        if($this->price_offer > 0 and $this->status=='active'){
                            $cartItem->price = $this->price_offer;
                        }else{
                            $cartItem->price = $this->price;
                        }
                        $cartItem->qty = 1;
                        $cartItem->save();

                        $cartOption = new CartOption();
                        $cartOption->cartItem_id = $cartItem->id;
                        $cartOption->color =   $this->color_id;
                        $cartOption->notes =   $this->notes;
                        $cartOption->save();

                        $this->alert('success', trans('user.cart_add_product'), [
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
                        return $this->redirect(route('ShoppingCart.index'));
                    } else {

                        $this->alert('error', trans('user.cart_item_inside'), [
                            'position' => session('lang')=='ar'? 'top-start':'top-end',
                            'timer' => 3000,
                            'toast' => true,
                            'text' => '',
                            'confirmButtonText' => 'Ok',
                            'cancelButtonText' => 'Cancel',
                            'showCancelButton' => false,
                            'showConfirmButton' => false,
                        ]);
                    }
                }
            } else {
                $userID =auth()->user()->id;
                if ($car_old =ModelsCart::where('user_id',$userID)->first()) {
                    $cart_item = ModelsCartItem::where('cart_id',$car_old->id)->where('product_id', $this->product_id)->first();
                    ModelsCart::where('user_id',$userID)->update(['updated_at'=>Carbon::now()]);
                    if (!$cart_item) {
                        $cartItem = new ModelsCartItem();
                        $cartItem->cart_id = $car_old->id;
                        $cartItem->product_id = $this->product_id;
                        if($this->price_offer > 0 and $this->status=='active'){
                            $cartItem->price = $this->price_offer;
                        }else{
                            $cartItem->price = $this->price;
                        }
                        $cartItem->qty = 1;
                        $cartItem->save();

                        $cartOption = new CartOption();
                        $cartOption->cartItem_id = $cartItem->id;
                        $cartOption->color =   $this->color_id;
                        $cartOption->notes =   $this->notes;
                        $cartOption->de_size = $this->de_size ;
                        $cartOption->save();

                        $this->alert('success', trans('user.cart_add_product'), [
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
                        $this->de_size = '';
                        return $this->redirect(route('ShoppingCart.index'));


                    } else {
                        $this->alert('error', trans('user.cart_item_inside'), [
                            'position' => session('lang')=='ar'? 'top-start':'top-end',
                            'timer' => 3000,
                            'toast' => true,
                            'text' => '',
                            'confirmButtonText' => 'Ok',
                            'cancelButtonText' => 'Cancel',
                            'showCancelButton' => false,
                            'showConfirmButton' => false,
                        ]);
                    }


                }else{
                    $cart = new  ModelsCart();
                    $cart-> id_cart =md5(uniqid(rand(), true));
                    $cart-> key =md5(uniqid(rand(), true));
                    $cart-> user_id =auth()->user()->id;
                    $cart->save();

                    $cart_item = ModelsCartItem::where('cart_id',$cart->id)->where('product_id', $this->product_id)->first();
                    if (!$cart_item) {

                        $cartItem = new ModelsCartItem();
                        $cartItem->cart_id = $cart->id;
                        $cartItem->product_id = $this->product_id;
                        if($this->price_offer > 0 and $this->status=='active'){
                            $cartItem->price = $this->price_offer;
                        }else{
                            $cartItem->price = $this->price;
                        }
                        $cartItem->qty = 1;
                        $cartItem->save();

                        $cartOption = new CartOption();
                        $cartOption->cartItem_id = $cartItem->id;
                        $cartOption->color =   $this->color_id;
                        $cartOption->notes =   $this->notes;
                        $cartOption->de_size = $this->de_size ;
                        $cartOption->save();

                        $this->alert('success', trans('user.cart_add_product'), [
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
                        $this->de_size = '';
                        return $this->redirect(route('ShoppingCart.index'));

                    } else {

                        $this->alert('error', trans('user.cart_item_inside'), [
                            'position' => session('lang')=='ar'? 'top-start':'top-end',
                            'timer' => 3000,
                            'toast' => true,
                            'text' => '',
                            'confirmButtonText' => 'Ok',
                            'cancelButtonText' => 'Cancel',
                            'showCancelButton' => false,
                            'showConfirmButton' => false,
                        ]);
                    }
                }
            }
        }else{
            $this->alert('error', trans('user.cart_item_inside'), [
                'position' => session('lang')=='ar'? 'top-start':'top-end',
                'timer' => 3000,
                'toast' => true,
                'text' => '',
                'confirmButtonText' => 'Ok',
                'cancelButtonText' => 'Cancel',
                'showCancelButton' => false,
                'showConfirmButton' => false,
            ]);
        }
    }


    public function render()
    {

        $products = Product::where('title', $this->post->title)->first();

        return view('livewire.style.products', [
            'products' => $products,
            's_colors' => $this->s_colors,
            'toCities' => $this->s_colors,

        ]);
    }

    public function changeStep($step)
    {

        if ($this->maxStep < $step) {
            // dd($step);
            return;
        }

        $this->currentStep = $step;
    }

    public function nextStep()
    {
        if($this->size_abaya_count >0){
            // if (in_array($this->currentStep, array_keys($this->stepRules))) {
            // foreach ($this->size_abaya as $index => $item) {
            //     // // skip first
            //     // if ($index == 0) {
            //     //     continue;
            //     // }
            //     // dd($item->size_abaya =='a_size1');

            //     if($item->size_abaya =='a_size1'){
            //         $this->validate($this->stepRules[1]);
            //     }
            //     else if($item->size_abaya =='a_size2'){
            //         $this->validate($this->stepRules[2]);
            //     }
            //     else if( $item->size_abaya =='a_size3'){
            //         $this->validate($this->stepRules[3]);
            //     }
            //    // code here
            //  }

            // }
            // dd($this->size_abaya_count);
            // if (in_array(1, array_keys($this->stepRules))) {
            //     $this->validate($this->stepRules[1]);
            // }

            // dd($this->currentStep);
            // if (in_array($this->currentStep, array_keys($this->stepRules))) {
            //     if (in_array($this->currentStep, array_keys($this->stepRules))) {
            //     foreach($this->size_abaya as $item){

            //         // foreach ($this->size_abaya as $item) {
            //         //     if ($fa-inverse < 1) continue;
            //         //     // your code here.
            //         //  }



            //             // dd($item);
            //         if($this->a_size1 == null && $item->size_abaya =='a_size1'){
            //             $this->validate($this->stepRules[1]);
            //         }
            //         else if($this->a_size2 == null && $item->size_abaya =='a_size2'){
            //             // dd($this->currentStep);
            //             $this->validate($this->stepRules[2]);
            //         }
            //         else if($this->a_size3 == null && $item->size_abaya =='a_size3'){
            //             // dd($this->currentStep);
            //             $this->validate($this->stepRules[3]);
            //         }
            //     }
            // }
                    //  if($this->a_size2 ==null){
                    //     $this->validate($this->stepRules[2]);
                    // }
                    //  if($this->a_size3 ==null){
                    //     $this->validate($this->stepRules[3]);
                    // }
                    //  if($this->a_size4 ==null){
                    //     $this->validate($this->stepRules[4]);
                    // }
                    //  if($this->a_size5 ==null){
                    //     $this->validate($this->stepRules[5]);
                    // }
                    //  if($this->a_size6 ==null){
                    //     $this->validate($this->stepRules[6]);
                    // }



            // }
        // }

            // $this->validate($this->stepRules[$item->id]);
            // $this->validate(
            //     [$item->size_abaya => 'required|numeric'],
            //     [
            //         $item->size_abaya.'required' => 'The :attribute cannot be empty.',

            //     ],
            //     [$item->size_abaya => 'Size 1']
            // );


        }
        else{

            if (in_array($this->currentStep, array_keys($this->stepRules))) {
                $this->validate($this->stepRules[$this->currentStep]);
            }
        }

        // $count =$this->size_abaya_count;
        if($this->size_abaya_count > 0){
            if ($this->currentStep >= $this->size_abaya_count  ) {
                $this->store();
                return $this->redirect(route('ShoppingCart.index'));
            }
        }else{
            if ($this->currentStep >= 6) {
                $this->store();
                return $this->redirect(route('ShoppingCart.index'));
            }
        }


        $this->currentStep = $this->currentStep + 1;
        $this->maxStep = max($this->maxStep, $this->currentStep);
    }
}
