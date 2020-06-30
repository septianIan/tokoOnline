<?php

namespace App\Http\Livewire;

use App\Product;
use Livewire\Component;

class ProductDetail extends Component
{   
    //properti untuk di pasing ke view livewire
    public $product;
    //method mount. untuk mengambil parameter dari url
    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.product-detail');
    }
}
