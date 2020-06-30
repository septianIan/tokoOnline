<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function(){
    return view('admin.category.index');
})->name('dashboard'); // karna di RouteServiceProvider sudah di kasih name('admin.')
 //middleware('auth', 'role:admin')
 // untuk has akses untuk cara pertama

Route::resource('categories', 'CategoryController');
Route::get('data/categories', 'DataTable\CategoryController')->name('data.categories');
Route::get('data/products', 'DataTable\ProductController')->name('data.products');

Route::resource('products', 'ProductController');