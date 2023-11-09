<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Stripe\StripeClient;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::latest()->get();
    }


    public function store(Request $request)
    {
        return response()->json([
            'message' => 'Product has been created!'
        ], 201);

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,webp',
            'seo' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|numeric',
        ]);

        $stripe = new StripeClient(config('app.stripe'));
        $result = $stripe->products->create([
            'name' => $request->title,
        ]);

        $product = Product::create([
            'title' => $request->title,
            'content' => $request->content,
            'seo' => $request->seo,
            'slug' => str_replace(' ', '-', strtolower($request->title)),
            'description' => $request->description,
            'image' => $request->image->store('products', 'public_disk'),
            'stripe_id' => $result['id'],
            'price' => $request->price
        ]);

        return response()->json([
            'product' => $product,
            'message' => 'Product has been created!'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function search()
    {
        //
    }
}
