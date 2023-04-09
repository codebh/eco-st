<?php

namespace App\Http\Livewire\Style;

use App\Models\Category;
use App\Models\Product;
use App\Services\PriceServiceCategory;
use Livewire\Component;
use Livewire\WithPagination;

class ProductCategoryFilter extends Component
{
    use WithPagination;
    public $count_products;
    public $category_id;
    public $category;
    public function mount($category_id)
    {
        $this->category_id = $category_id;
        $this->category= Category::findOrFail($this->category_id);
        // dd($this->category);
        $this->count_products = Product::where(function($q){
            $q->where('show','active')->orWhere('show','not active');
        })->where('category_id',$this->category_id)->count() ;
    }

    public $selected = [
        'prices' => [],
        'colors' => [],
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





    protected    $listeners   = ['updatedSidebarCategory' => 'setSelectedCategory'];


    public function render(PriceServiceCategory $priceService)
    {


        $productsCategory = Product::where(function($q){
            $q->where('show','active')->orWhere('show','not active');
        })
        ->where('category_id',$this->category_id)->WithFiltersColor(
            $this->selected['prices'],
            $this->selected['colors'],
            $this->selected['stores']
            )->orderBy($this->orderBy['key'], $this->orderBy['direction'])->paginate(8);
            return view('livewire.style.product-category-filter',compact('productsCategory'));


    }


    public function setSelectedCategory($selected)
    {
        $this->resetPage();
        $this->selected = $selected;
    }


}
