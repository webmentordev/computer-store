<?php

namespace App\Models;

use App\Models\Stock;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'price',
        'stripe_id',
        'description',
        'seo',
        'image',
        'is_active',
        'category_id',
        'sub_category_id',
        'is_featured'
    ];

    public function stock(){
        return $this->hasOne(Stock::class);
    }
}
