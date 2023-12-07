<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'purchase_price',
        'selling_price',
        'quantity',
        'image',
        'imageId',
        'description',
        'manufacturer_id',
        'subcategory_id',
    ];
}
