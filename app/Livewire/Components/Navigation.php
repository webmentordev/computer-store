<?php

namespace App\Livewire\Components;

use App\Models\Product;
use Livewire\Component;

class Navigation extends Component
{
    public $search = "";
    public function render()
    {
        return view('livewire.components.navigation', [
            'products' => Product::where('title', 'LIKE', '%'.$this->search.'%')->get()
        ]);
    }
}
