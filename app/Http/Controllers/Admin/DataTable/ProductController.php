<?php

namespace App\Http\Controllers\Admin\DataTable;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $products = Product::latest();

        return \datatables()->of($products)
                    ->addColumn('action', 'admin.templates.components.DT-action')
                    ->addColumn('image', function(Product $product){
                        return '<img src="'. $product->getImage() .'" height="130px"/>';
                    })
                    ->addColumn('sellPrice', function(Product $product){
                        return $product->getSellPrice();
                    })
                    ->addColumn('description', function(Product $product){
                        return $product->getDescription();
                    })
                    ->addIndexColumn()
                    ->rawColumns(['image', 'action'])
                    ->toJson();
    }
}
