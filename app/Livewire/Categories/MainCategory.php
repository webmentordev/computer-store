<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class MainCategory extends Component
{
    use WithFileUploads;

    public $name;

    protected $rules = [
        'name' => 'required|max:255|unique:categories,name'
    ];

    public function render()
    {
        return view('livewire.categories.main-category', [
            'categories' => Category::latest()->withCount('products', 'subcategory')->paginate(100)
        ]);
    }

    public function create(){
        $this->validate();

        Category::create([
            'name' => $this->name,
            'slug' => str_replace(' ', '-', strtolower($this->name))
        ]);

        $this->reset();
        session()->flash('success', 'Category has been created!');
    }
}
