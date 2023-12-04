<?php

namespace App\Livewire\Stock;

use App\Models\Stock;
use App\Models\Product;
use App\Models\StockHistory;
use Livewire\Component;

class AddStock extends Component
{
    public $provider = null, $product, $stock = 0, $search = "";

    protected $rules = [
        'provider' => 'nullable|max:255',
        'stock' => 'required|numeric|min:1',
        'product'=> 'required|numeric'
    ];

    public function render()
    {
        $stocks = Stock::whereHas('product', function ($query) {
            $query->where('title', 'like', '%' . $this->search . '%');
        })->get();

        return view('livewire.stock.add-stock', [
            'stocks' => $stocks,
            'products' => Product::latest()->get()
        ]);
    }


    public function create(){
        $this->validate();

        if($this->provider == ""){
            $this->provider = null;
        }

        $stock = Stock::where('product_id', $this->product)->first();
        
        if($stock == null){
            Stock::create([
                'stock' => $this->stock,
                'provider' => $this->provider,
                'product_id' => $this->product,
            ]);
        }else{
            $stock->stock = $stock->stock + $this->stock;
            $stock->save();
        }

        StockHistory::create([
            'stock' => $this->stock,
            'provider' => $this->provider,
            'product_id' => $this->product,
        ]);

        $this->stock = 0;
        $this->product = null;
        $this->provider = null;
        
        session()->flash('success', 'New Stock has been added!');
    }
}
