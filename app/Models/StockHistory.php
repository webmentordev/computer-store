<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'provider',
        'product_id',
        'stock'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}