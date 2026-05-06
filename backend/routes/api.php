<?php

use App\Models\Product;
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