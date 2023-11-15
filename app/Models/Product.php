<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
