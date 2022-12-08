<?php

namespace App\Http\Livewire\Style;

use App\Models\FavItems as ModelsFavItems;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class FavItems extends Component
{
    use WithPagination;
    use LivewireAlert;



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
        if ( ModelsFavItems::find($this->deleteId)->where('user_id',auth()->user()->id)->exists()) {
            ModelsFavItems::find($this->deleteId)->delete();
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
    {
        // return view('livewire.style.fav-items');




        $products = ModelsFavItems::where('user_id',auth()->user()->id)->paginate(8);
        return view('livewire.style.fav-items', [
//            'products' => Product::paginate(8),
            'products' => $products
        ]);
    }
}
