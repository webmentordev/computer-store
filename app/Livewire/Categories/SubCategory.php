<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use App\Models\SubCategory as ModelSubCategory;
use Livewire\Component;
use Livewire\WithPagination;

class SubCategory extends Component
{
    use WithPagination;

    public $name, $category;

    protected $rules = [
        'name' => 'required|max:255|unique:sub_categories,name',
        'category' => 'required|numeric'
    ];


    public function render()
    {
        return view('livewire.categories.sub-category', [
            'categories' => ModelSubCategory::latest()->withCount('products', 'category')->paginate(100),
            'parent_category' => Category::latest()->get()
        ]);
    }

    public function create(){
        $this->validate();

        ModelSubCategory::create([
            'name' => $this->name,
            'slug' => str_replace(' ', '-', strtolower($this->name)),
            'category_id' => $this->category
        ]);

        $this->name = "";
        session()->flash('success', 'SubCategory has been created!');
    }
}
