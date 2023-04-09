<?php

namespace App\Http\Livewire\Admin;

use App\Models\Guide as ModelsGuide;
use Livewire\Component;

class Guide extends Component
{


    public function updateOrder($list)
    {
        // dd($list);
        foreach($list as $item) {
            // dd($item);
            // ModelsFaq::find($item['value'])->update(['position' => $item['order']]);

            $faq = ModelsGuide::find($item['value']);
            $faq->serial = $item['order'];
            $faq->save();
        }
    }




    public function render()
    {

        return view('livewire.admin.guide', [
            'products' => ModelsGuide::orderBy('serial')->get()
        ]);
    }
}
