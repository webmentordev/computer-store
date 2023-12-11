<?php

namespace App\Livewire\Components;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;

class Navigation extends Component
{
    public $search = "", $cart_items = 0;

    public function mount(){
        if(session()->get('cart')){
            $this->cartCount();
        }
    }

    public function render()
    {
        return view('livewire.components.navigation', [
            'products' => Product::where('title', 'LIKE', '%'.$this->search.'%')->get()
        ]);
    }

    #[On('cart-count')]
    public function cartCount(){
        $this->cart_items = count(session()->get('cart'));
    }
}