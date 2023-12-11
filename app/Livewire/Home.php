<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Home extends Component
{
    #[Layout('layouts.home')]
    public function render()
    {
        return view('livewire.home', [
            'products' => Product::latest()->get()
        ]);
    }

    public function add_to_cart($product){
        $cart = session()->get('cart');
        $cart[$product] = [
            'quantity' => 1,
            'slug' => $product
        ];
        session()->put('cart', $cart);
        $this->dispatch('cart-count');
    }
}