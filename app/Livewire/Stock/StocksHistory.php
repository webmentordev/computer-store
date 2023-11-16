<?php

namespace App\Livewire\Stock;

use App\Models\StockHistory;
use Livewire\Component;

class StocksHistory extends Component
{
    public function render()
    {
        return view('livewire.stock.stocks-history', [
            'stocks' => StockHistory::latest()->with('product')->get()
        ]);
    }
}
