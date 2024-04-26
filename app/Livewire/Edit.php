<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $imgView;

    public function render()
    {
        return view('product.edit');
    }
}
