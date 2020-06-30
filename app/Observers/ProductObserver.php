<?php

namespace App\Observers;

use App\Product;
use Illuminate\Support\Str;

//daftar kan di AppServiceProvider
class ProductObserver
{
    public function creating(Product $product)
    {
        $product->slug = Str::slug($product->name);
    }
}
