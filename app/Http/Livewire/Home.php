<?php

namespace App\Http\Livewire;

use App\Category;
use App\Product;
use Livewire\Component;

class Home extends Component
{
     //properti untuk di pasing ke view livewire
    public $search;
    public $category;
    //properti untuk value URLnya
    protected $updatesQueryString = ['search'];

    //method mount. untuk mengambil parameter dari url
    public function mount()
    {
        /**
         * jadi properti search ini nya value dari String URL.
         */
        $this->search = \request('search');
    }
    public function render()
    {
        $products = Product::query();
        //jika properti searchnya ada value atau tidak null
        if($this->search !== null){
            //akan mencari nama yang mengandung kata yang dicari
            $products->where('name', 'like', '%' . $this->search . '%');
        }

        if ($this->category !== null) {
            //klo prodak ini punya kategori
            $products->whereHas('categories', function($query){
                //where berdasar akn properti category(ini nya id dari category)
                return $query->where('category_id', $this->category);
            });
        }
        return view('livewire.home', [
            'categories' => Category::get(),
            'products' => $products->paginate(12)
        ]);
    }

    public function selectCategory($categoryId)
    {
        //id disimpan di properti category
        $this->category = $categoryId;
    }
}
