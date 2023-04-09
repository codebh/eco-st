<?php

namespace App\Http\Livewire\Style;

use Livewire\Component;

class SaveForLater extends Component
{
    protected $listeners = [
        'saveForLater' => 'render',



    ];
    public function render()
    {
        return view('livewire.style.save-for-later');
    }
}
