<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, HasUuid;

    protected $table = 'products';
    protected $fillable = [
        'product_code',
        'product_name',
        'product_type',
        'product_weight',
        'product_unit',
        'product_brand',
        'product_status',
        'stock',
        'price'
    ];
}
