<?php


namespace App\Services;

use App\Models\Product;

class PriceService
{
    private $prices;
    private $stores;
    private  $categories;

    public function getPrices($prices, $stores,$categories)
    {
        $this->prices = $prices;
        $this->stores = $stores;
        $this->categories = $categories;
        $formattedPrices = [];

        foreach(Product::PRICES as $index => $name) {
            $formattedPrices[] = [
                'name' => $name,
                'products_count' => $this->getProductCount($index)
            ];
        }

        return $formattedPrices;
    }

    private function getProductCount($index)
    {
        return Product::where('show','active')->orWhere('show','not active')->withFilters($this->prices, $this->stores,$this->categories)
            ->when($index == 0, function ($query) {
                $query->where('price', '<', '20');
            })
            ->when($index == 1, function ($query) {
                $query->whereBetween('price', ['20', '40']);
            })
            ->when($index == 2, function ($query) {
                $query->whereBetween('price', ['40', '60']);
            })
            ->when($index == 3, function ($query) {
                $query->where('price', '>', '60');
            })
            ->count();
    }
}

