<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stock extends Model
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