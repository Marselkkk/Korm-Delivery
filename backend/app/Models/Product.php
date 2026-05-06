<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category_id',
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function weights()
    {
        return $this->hasMany(ProductWeight::class);
    }

    public function nutrients()
    {
        return $this->belongsToMany(Nutrient::class, 'product_nutrient')
        ->withPivot('amount');
    }

    public function relatedProducts()
    {
        return $this->belongsToMany(Product::class, 'related_products', 'product_id', 'related_id');
    }

    public function productNutrients()
    {
        return $this->hasMany(ProductNutrient::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
