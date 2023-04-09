<?php

namespace App\Http\Livewire\Style;

use App\Models\FavItems;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class AddToFav extends Component
{
    use LivewireAlert;

    public $check_product  ;
    public $fav_item  ;
    public $user_id  ;
    public $product_id  ;
    public $post  ;



    public function addFav($user_id,$product_id){
        // dd([$this->user_id,$this->product_id]);

        if(FavItems::where('product_id',$this->product_id)->where('user_id',$this->user_id)->exists()){
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
            $fav =new FavItems();
            $fav->product_id = $this->product_id;
            $fav->user_id = $this->user_id;
            $fav->save();

        }
        $this->mount($this->post,$this->user_id);

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

        if(FavItems::where('product_id',$this->product_id)->where('user_id',$this->user_id)->exists()){
            $this->validate([
                'product_id'=>'required',
                'user_id'=>'required',
            ]);

            $fav = FavItems::where('product_id',$this->product_id)->where('user_id',$this->user_id)->delete();
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
        $this->mount($this->post,$this->user_id);



    }

    public function mount($post,$user_id)
    {
        $this->product_id = $post->id;
        $this->user_id = $user_id;
        $this->check_product = FavItems::where('product_id',$this->product_id)->where('user_id',$this->user_id)->exists();
        $this->fav_item= FavItems::where('product_id',$this->product_id)->where('user_id',$this->user_id)->get();

    }

    public function render()
    {
        return view('livewire.style.add-to-fav');
    }
}
