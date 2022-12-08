<?php

namespace App\Http\Livewire\Admin;

use App\Models\Faq as ModelsFaq;
use Livewire\Component;
use Livewire\WithPagination;

class Faq extends Component
{
    use WithPagination;
    public function render()
    {
        // return view('livewire.admin.faq');


        return view('livewire.admin.faq', [
            'products' => ModelsFaq::orderBy('serial')->get()
        ]);
    }


    public function updateOrder($list)
    {
        // dd($list);
        foreach($list as $item) {
            // dd($item);
            // ModelsFaq::find($item['value'])->update(['position' => $item['order']]);

            $faq = ModelsFaq::find($item['value']);
            $faq->serial = $item['order'];
            $faq->save();
        }
    }
}
