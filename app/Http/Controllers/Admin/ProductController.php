<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //\dd(\request()->segment(2)); //admin/product
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('admin.product.create', \compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        $image = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('product');
        }

        //ambil data dari selec option
        $categories = Category::find($request->categories);
        $slug = Str::slug($request->name);

        /**
         * only->('id', 'name') ambil key id dan name saja
         * except->('id', 'name) ambil kecuali id dan name
         */
        $data = array_merge(
            $request->except('_token', 'categories', 'image'), \compact('image')
        );

        $product = Product::create($data);

        $product->categories()->attach($categories);

        session()->flash('message', 'Data added Successfully');
        return \redirect(route('admin.products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::orderBy('name', 'asc')->get();
        return view('admin.product.edit', \compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, Product $product) //model bainding
    {
        //kalo tidak ada di table maka di set null deafult nya
        $image = $product->image ?? null;

        if ($request->hasFile('image')) {
            Storage::delete($product->image);
            $image = $request->file('image')->store('product');
        }

        $categories = Category::find($request->categories);

        /**
         * only->('id', 'name') ambil key id dan name saja
         * except->('id', 'name) ambil kecuali id dan name
         */
        
        $dataUpdate = array_merge(
            $request->except('_token', '_method', 'categories', 'image'), \compact('image')
        );

        $product->update($dataUpdate);

        $product->categories()->sync($categories);

        session()->flash('message', 'Product updated successfully');
        return \redirect(route('admin.products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product) //model bainding
    {
        //ambil data imgae
        if ($product->image) {
            Storage::delete($product->image);
        }
        $product->delete();
        return response()->json(['sukses' => true]);
    }
}
