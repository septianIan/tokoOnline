<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $guarded = [];

    // method event eloquent
    // jika membutuhkan yang lebanyak, gunakan obeserver
    // protected static function boot()
    // {
    //     parent::boot();
    //     /**
    //      * created / ketika data sudah di buat
    //      * creating / ketika sedang di buat
    //      */
    //     // ketika sedang proses membuat data, lalu membuat slugnya
    //     Product::creating(function($product) {
    //         $product->slug = Str::slug($product->name);
    //     });

    //     // ketika data nya sudah di buat, lalu membuat slugnya
    //     // Product::created(function($product) {
    //     //     $product->slug = Str::slug($product->name);
    //     // });
    // }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function getImage()
    {
        return asset('storage/' . $this->image);
    }

    public function getSellPrice()
    {
        return \number_format($this->sellPrice);
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getDescription()
    {
        return Str::limit($this->description, 100);
    }
}
