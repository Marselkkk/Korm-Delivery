<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductNutrient extends Model
{
    protected $table = 'product_nutrient';

    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'nutrient_id',
        'amount',
    ];

    public function nutrient()
    {
        return $this->belongsTo(Nutrient::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}