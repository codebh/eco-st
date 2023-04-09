<?php

namespace App\Http\Livewire\Style;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class NewProduct extends Component
{
    use WithPagination;

//
//    public $colorSelect;
//
//    public $colorBy = [
//        'key' => 'color_id',
//    ];
//    public function updatedColorSelect($value){
//        $this->colorBy = json_decode($this->colorSelect, true);
//
//    }

    public function render()
    {
//        dd(reqest);
            $products = Product::where('show','active')->orWhere('show','not active')->orderBy('id', 'desc')->paginate(8);
            return view('livewire.style.new-product', [
//            'products' => Product::paginate(8),
                'products' => $products
            ]);

    }
}
