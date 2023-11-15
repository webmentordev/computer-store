<?php

namespace App\Livewire\Product;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Stripe\StripeClient;

class Products extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $title, $price = 0.0, $seo, $description, $image, $content, $category = 0, $sub_category;

    protected $rules = [
        'title' => 'required|max:255',
        'seo' => 'required|max:255',
        'price' => 'required|min:1',
        'content' => 'required',
        'description' => 'required',
        'image' => 'required|image|mimes:jpg,png,jpeg'
    ];

    public function render()
    {
        return view('livewire.product.products', [
            'products' => Product::latest()->paginate(100),
            'categories' => Category::latest()->get(),
            'sub_categories' => SubCategory::latest()->where('category_id', $this->category)->get()
        ]);
    }

    public function create(){
        $this->validate();

        $stripe = new StripeClient(config('app.stripe'));
        $result = $stripe->products->create([
            'name' => $this->title,
        ]);

        Product::create([
            'title' => $this->title,
            'slug' => str_replace(' ', '-', strtolower($this->title)),
            'price' => $this->price,
            'category_id' => $this->category,
            'sub_category_id' => $this->sub_category,
            'price' => $this->price,
            'seo' => $this->seo,
            'content' => $this->content,
            'description' => $this->description,
            'stripe_id' => $result['id'],
            'image' => $this->image->store('products', 'public_disk')
        ]);
        $this->reset();
        session()->flash('success', 'Product has been created!');
    }
}