<?php

use App\Category;
use App\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::livewire('/', 'home')->name('index');
Route::livewire('/productDetail/{product:slug}', 'product-detail')->name('product.detail');

Route::get('/default', function () {
    return view('admin.templates.default');
})->name('default');

Route::get('/test', function () {
    return view('test');
});

Auth::routes(['verify' => true]);

//halaman ini hanya bisa di akses oleh emial yang tervefivikasi
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
