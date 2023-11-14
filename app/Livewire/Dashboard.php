<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard', [
            'products' => count(Product::get()),
            'price' => Product::sum('price'),
        ]);
    }
}
