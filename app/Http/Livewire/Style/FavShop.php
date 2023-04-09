<?php

namespace App\Http\Livewire\Style;

use App\Models\FavShops;
use App\Models\Store;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class FavShop extends Component
{
    use LivewireAlert;
    public $orderSelect;
    public  $count_shop ;




    public $orderBy = [
        'key' => 'created_at',
        'direction' => 'desc'
    ];
    public function updatedOrderSelect($value){
        $this->orderBy = json_decode($this->orderSelect, true);
    }

    public $perPage =4 ;
    public function loadMore()
    {
        $this->perPage += 4;
    }

    public function mount()
    {
        $this->count_shop =FavShops::where('user_id',auth()->user()->id)->count();

    }

    public function removeFav($store_id){
        // dd($store_id);
        if(FavShops::where('id',$store_id)->where('user_id',auth()->user()->id)->exists()){
            // $this->validate([
            //     'id'=>'required',
            //     // 'user_id'=>'required',
            // ]);

            $fav = FavShops::where('id',$store_id)->where('user_id',auth()->user()->id)->delete();
            // dd('done');
            // $fav_i = FavItems::find($fav->id);
            // $fav_i->delete();

            // $fav->product_id = $this->product_id;
            // $fav->user_id = $this->user_id;


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
        $this->mount();

$this->render();



    }


    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function delete()
    {
        if ( FavShops::find($this->deleteId)->where('user_id',auth()->user()->id)->exists()) {
            FavShops::find($this->deleteId)->delete();
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

    }

    public function render()
    { $stores = FavShops::where('user_id',auth()->user()->id)->orderBy($this->orderBy['key'], $this->orderBy['direction'])->paginate($this->perPage);
        return view('livewire.style.fav-shop'
        ,[
            'stores'=>$stores,

            ]);


        // return view('livewire.style.fav-shop');
    }
}
