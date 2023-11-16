<?php

namespace App\Livewire\Stock;

use App\Models\Stock;
use App\Models\Product;
use App\Models\StockHistory;
use Livewire\Component;

class AddStock extends Component
{
    public $provider = null, $product, $stock = 0;

    protected $rules = [
        'provider' => 'nullable|max:255',
        'stock' => 'required|numeric|min:1',
        'product'=> 'required|numeric'
    ];

    public function render()
    {
        return view('livewire.stock.add-stock', [
            'stocks' => Stock::latest()->with('product')->get(),
            'products' => Product::latest()->get()
        ]);
    }


    public function create(){
        $this->validate();

        if($this->provider == ""){
            $this->provider = null;
        }

        Stock::create([
            'stock' => $this->stock,
            'provider' => $this->provider,
            'product_id' => $this->product,
        ]);

        StockHistory::create([
            'stock' => $this->stock,
            'provider' => $this->provider,
            'product_id' => $this->product,
        ]);

        $this->reset();
        session()->flash('success', 'New Stock has been added!');
    }
}
