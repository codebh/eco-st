<?php

namespace App\Http\Livewire\Style;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Store;
use Livewire\Component;
use App\Services\PriceService ;

class SideAllProduct extends Component
{
    public $selected = [
        'prices' => [],
        'categories' => [],
        'stores' => []
    ];


    public function render(PriceService $priceService)
    {
        $prices = $priceService->getPrices(
            $this->selected['categories'],
            [],
            $this->selected['stores'],
        );

        $categories = Category::withCount(['products' => function ($query) {
            $query->withFilters(
                [],
                $this->selected['prices'],
                $this->selected['stores']
            );
        }])
            ->get();

        $stores = Store::withCount(['products' => function ($query) {
            $query->withFilters(
                $this->selected['categories'],
                $this->selected['prices'],
                []
            );
        }])->get();


        return view('livewire.style.side-all-product', compact('prices', 'stores','categories'));
    }

    public function updatedSelected()
    {
        $this->emit('updatedSidebar', $this->selected);
    }
}
