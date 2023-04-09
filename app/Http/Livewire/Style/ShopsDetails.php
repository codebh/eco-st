<?php

namespace App\Http\Livewire\Style;

use App\Models\FavShops;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class ShopsDetails extends Component
{
    use LivewireAlert;
    public $check_product  ;
    public $fav_item  ;
    public $user_id  ;
    public $product_id  ;
    // public $post  ;



  public $store;
  public $products;
  public $count_products;

    use WithPagination;
    public $orderSelect;

    public $orderBy = [
        'key' => 'created_at',
        'direction' => 'desc'
    ];
    public function updatedOrderSelect($value){
        $this->orderBy = json_decode($this->orderSelect, true);
    }
    public $colorSelect;
    public $colorBy = [
        'key' => 'color_id',
//        'direction' => 'desc'
    ];
    public function updatedColorSelect($value){
        $this->colorBy = json_decode($this->colorSelect, true);
//        dd($this->colorBy);
    }

    public function mount($store)
     {

        $this->store= Store::where('slug',$store->slug)->firstOrFail();
        $this->count_products = Product::where(function($q){
            $q->where('show','active')->orWhere('show','not active');
        })
        ->where('store_id',$store->id)->count();

//        $this->products = Product::all()->where('store_id', $store->id);


        $this->product_id = $store->id;
        if (Auth::check()) {
            $this->user_id = auth()->user()->id;
            $this->check_product = FavShops::where('store_id',$this->product_id)->where('user_id',$this->user_id)->exists();
            $this->fav_item= FavShops::where('store_id',$this->product_id)->where('user_id',$this->user_id)->get();
        }

     }



     public function addFav($user_id,$product_id){
        // dd([$this->user_id,$this->product_id]);
        // dd($this->user_id);

        if(FavShops::where('store_id',$this->product_id)->where('user_id',$this->user_id)->exists()){
            $this->alert('error', 'already inside the fav', [
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
            $this->validate([
                'product_id'=>'required',
                'user_id'=>'required',
            ]);
            $fav =new FavShops();
            $fav->store_id = $this->product_id;
            $fav->user_id = $this->user_id;
            $fav->save();

        }
        $this->mount($this->store);

        $this->alert('success', trans('shop.uploaded_successfully'), [
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

    public function removeFav($user_id,$product_id){
        // dd($user_id);

        if(FavShops::where('store_id',$this->product_id)->where('user_id',$user_id)->exists()){
            $this->validate([
                'product_id'=>'required',
                'user_id'=>'required',
            ]);

            $fav = FavShops::where('store_id',$this->product_id)->where('user_id',$user_id)->delete();
            // dd('done');
            // $fav_i = FavItems::find($fav->id);
            // $fav_i->delete();

            // $fav->product_id = $this->product_id;
            // $fav->user_id = $this->user_id;
            $this->alert('success', trans('shop.uploaded_successfully'), [
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
            $this->alert('error', 'already inside the fav', [
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
        $this->mount($this->store);


    }





    public function render()
    {
        if ($this->colorSelect == null) {
            $products_shop = Product::where(function($q){
                $q->where('show','active')->orWhere('show','not active');
            })
            ->where('store_id', $this->store->id)->orderBy($this->orderBy['key'], $this->orderBy['direction'])->paginate(8);
//            dd($products);
            $this->resetPage();
            return view('livewire.style.shops-details',[

                'products_shop' => $products_shop
            ]);
        }else{

            $products_shop = Product::where(function($q){
                $q->where('show','active')->orWhere('show','not active');
            })->
            where('store_id', $this->store->id)->where('color_id',$this->colorBy['key'] )->orderBy($this->orderBy['key'], $this->orderBy['direction'])->paginate(8);
            $this->resetPage();
            return view('livewire.style.shops-details',[

                'products_shop' => $products_shop
            ]);
        }
    }
}
