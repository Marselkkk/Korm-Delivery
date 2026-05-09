<?php

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); 
    
Route::get('/products', function () {
    return Product::with([
        'category',
        'images',
        'weights',
        'nutrients',
    ])->get();
});

Route::get('/products/{id}', function ($id) {

    return Product::with([
        'images',
        'weights',
        'nutrients',
        'category',
        'relatedProducts',
    ])->findOrFail($id);

});

Route::get('/reviews', function () {

    return Review::latest()->get();

});