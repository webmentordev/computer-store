<?php

namespace App\Livewire\Stock;

use App\Models\StockHistory;
use Livewire\Component;

class StocksHistory extends Component
{
    public $search;
    public function render()
    {
        $stocks = StockHistory::whereHas('product', function ($query) {
            $query->where('title', 'like', '%' . $this->search . '%');
        })->get();

        return view('livewire.stock.stocks-history', compact('stocks'));
    }
}
