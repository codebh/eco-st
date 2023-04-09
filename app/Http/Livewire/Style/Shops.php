<?php

namespace App\Http\Livewire\Style;

use App\Models\Store;
use Livewire\Component;
use Livewire\WithPagination;

class Shops extends Component
{
    use WithPagination;


    public $orderSelect;
    public  $count_shop ;




    public $orderBy = [
        'key' => 'created_at',
        'direction' => 'desc'
    ];
    public function updatedOrderSelect($value){
        $this->orderBy = json_decode($this->orderSelect, true);
    }

    public $perPage =12 ;
    public function loadMore()
    {
        $this->perPage += 4;
    }

    public function mount()
    {
        $this->count_shop =Store::all()->count();

    }
    public function render()
    {
        $stores = Store::orderBy($this->orderBy['key'], $this->orderBy['direction'])->paginate($this->perPage);
        return view('livewire.style.shops'
        ,[
            'stores'=>$stores,

            ]);
    }
}
