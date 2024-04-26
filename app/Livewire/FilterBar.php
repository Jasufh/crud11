<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class FilterBar extends Component
{
    public $search;
    public $categories;
    public $categoryFilter=null;

    public function mount()
    {
        $this->categories = Category::all();

    }

    public function render()
    {
        $products = Product::query()
            ->when($this->categoryFilter, function($query){
                $query->where('category_id', $this->categoryFilter);
            })
            ->when($this->search, function($query){
                $query->where('product_name', 'LIKE', '%' .$this->search. '%');
            })
            ->with('category')->get();
            



        return view('livewire.filter-bar', compact('products'));
    }
}
