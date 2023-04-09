<?php

namespace App\Http\Livewire\Style;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class SaleProducts extends Component
{  use WithPagination;
    public $orderSelect;

public $count_products;
public function mount(){
$this->count_products = Product::where(function($q){
    $q->where('show','not active')->orWhere('show','active');
})
->where('status','active')->where('price_offer','>','0')->count() ;
}

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
    public function render()
    {
        if ($this->colorSelect == null) {
            $products = Product::where(function($q){
                $q->where('show','not active')->orWhere('show','active');
            })->
            where('status','active')->where('price_offer','>','0')->orderBy($this->orderBy['key'], $this->orderBy['direction'])->paginate(8);
            $this->resetPage();
            return view('livewire.style.sale-products',[

                'products' => $products
            ]);
        }else{

       $products = Product::where(function($q){
        $q->where('show','not active')->orWhere('show','active');
    })->
       where('status','active')->where('price_offer','>','0')->where('color_id',$this->colorBy['key'] )->orderBy($this->orderBy['key'], $this->orderBy['direction'])->paginate(8);
       $this->resetPage();
       return view('livewire.style.sale-products',[

            'products' => $products
        ]);
        }
    }
}
