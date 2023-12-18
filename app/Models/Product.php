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

    public function subCategories()
    {
        return $this->belongsToMany('App\Models\SubCategory');
    }

    //check user subCategorys
    public function hasAnysubCategories(array $subCategories)
    {

        if ($this->subCategorys()->whereIn('name', $subCategories)->first()) {
            return true;
        }

        return false;
    }

    public function hasAnysubCategory(string $subCategory)
    {

        if ($this->subCategorys()->where('name', $subCategory)->first()) {
            return true;
        }

        return false;
    }
}
