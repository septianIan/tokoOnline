<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $guarded = [];
    public $timestamps = \false;

    protected static function boot()
    {
        parent::boot();
        Category::creating(function($category){
            $category->slug = Str::slug($category->name);
        });
    }
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
