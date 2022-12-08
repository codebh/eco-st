<?php


namespace App\Services;

use App\Models\Product;

class PriceServiceCategory
{
    private $prices;
    private $stores;
    private $colors;

    public function getPricesCategory($prices, $stores,$colors)
    {
        $this->prices = $prices;
        $this->stores = $stores;
        $this->colors = $colors;
        $formattedPrices = [];

        foreach(Product::PRICES as $index => $name) {
            $formattedPrices[] = [
                'name' => $name,
                'products_count' => $this->getProductCountCategory($index)
            ];
        }

        return $formattedPrices;
    }

    private function getProductCountCategory($index)
    {
        return Product::WithFiltersColor($this->prices, $this->stores,$this->colors)
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

