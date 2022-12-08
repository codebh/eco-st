<?php

namespace App\Http\Livewire\Style;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Store;
use Livewire\Component;
use App\Services\PriceServiceCategory;

class SideCategoryFilter extends Component
{
    public $selected = [
        'prices' => [],
        'colors' => [],
        'stores' => []
    ];


    public function render(PriceServiceCategory $priceService)
    {
        $prices = $priceService->getPricesCategory(
            $this->selected['colors'],
            [],
            $this->selected['stores'],
        );

        $colors = Color::withCount(['products' => function ($query) {
            $query->WithFiltersColor(
                [],
                $this->selected['prices'],
                $this->selected['stores']
            );
        }])
            ->get();

        $stores = Store::withCount(['products' => function ($query) {
            $query->WithFiltersColor(
                $this->selected['colors'],
                $this->selected['prices'],
                []
            );
        }])->get();


        return view('livewire.style.side-category-filter', compact('prices', 'stores','colors'));
    }

    public function updatedSelected()
    {
        $this->emit('updatedSidebarCategory', $this->selected);
    }

}
