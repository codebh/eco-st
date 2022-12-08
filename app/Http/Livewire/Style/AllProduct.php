<?php

namespace App\Http\Livewire\Style;

// use App\Http\Middleware\Store;
use App\Models\Category;
use App\Models\Store;
use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use App\Services\PriceService ;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class AllProduct extends Component
{
         use WithPagination;
         use LivewireAlert;
        public $count_products;
        // public $count_products_auto;
        public function mount()
        {
            $this->count_products = Product::where('show','active')->orWhere('show','not active')->count() ;
        }

        public $selected = [
            'prices' => [],
            'categories' => [],
            'stores' => []
        ];

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
    ];

    public function updatedColorSelect($value){
        $this->colorBy = json_decode($this->colorSelect, true);
    }



    protected    $listeners   = ['updatedSidebar' => 'setSelected'];


    public function render(PriceService $priceService)
    {


        if ( $this->colorSelect == null) {
            $products = Product::where('show','active')->orWhere('show','not active')->withFilters(
                $this->selected['prices'],
                $this->selected['categories'],
                $this->selected['stores']
                )->orderBy($this->orderBy['key'], $this->orderBy['direction'])->paginate(8);
                $this->resetPage();
                return view('livewire.style.all-product',compact('products'));

            }else {

                $products = Product::where(function ($q) {
                    $q->where('show','active')->orWhere('show','not active');
                })->where('color_id',$this->colorBy['key'])->withFilters(
                    $this->selected['prices'],
                    $this->selected['categories'],
                    $this->selected['stores']
                    // )->orderBy($this->orderBy['key'], $this->orderBy['direction'])->paginate(8)->queryString =['products'];
                    )->orderBy($this->orderBy['key'], $this->orderBy['direction'])->paginate(8);
                    $this->resetPage();
                    return view('livewire.style.all-product',compact('products'));
             }
    }
    // public function fetchData(){
    //     // dd('here');
    //      $this->count_products;
    // }


    public function setSelected($selected)
    {
        $this->resetPage();
        $this->selected = $selected;
    }




}
