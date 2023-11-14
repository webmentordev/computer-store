<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Stripe\StripeClient;

class Products extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $title, $price = 0.0, $seo, $description, $image, $content;

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
            'products' => Product::latest()->paginate(100)
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