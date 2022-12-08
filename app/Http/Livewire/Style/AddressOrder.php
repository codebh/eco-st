<?php

namespace App\Http\Livewire\Style;

use Livewire\Component;

class AddressOrder extends Component
{
    public $city_id = '';
    public $cities = [
        1 => 'داخل ممكلة البحرين',
        2 => 'خارج مملكة البحرين',
//        3 => 'Ahmedabad'
    ];
    public function changeEvent($value)
    {
        $this->city_id = $value;
    }
    public function render()
    {
        return view('livewire.style.address-order');
    }
}
