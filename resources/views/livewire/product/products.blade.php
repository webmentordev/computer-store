<div class="w-full">
    <div class="flex items-center justify-between mb-3">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ __('Products Listing') }}
        </h2>
        <div x-data="{ open: false }">
            <button x-on:click="open = true" class="py-2 px-4 bg-black text-white font-semibold rounded-md">Create Product</button>
            <div class="fixed top-0 left-0 w-full h-full bg-center bg-white/50 backdrop-blur" x-show="open" x-transition x-cloak>
                <div class="w-full h-full flex items-center justify-center" x-on:click.self="open = false">
                    <form wire:submit='create' class="max-w-2xl p-6 rounded-lg bg-white shadow-lg w-full">
                        <h1 class="text-4xl mb-3">Create Products</h1>
                        
                        @if (session('success'))
                            <p class="text-center py-3 text-green-600">{{ session('success') }}</p>
                        @endif
                        
                        <div class="grid grid-cols-2 gap-5">
                            <div class="w-full mb-3">
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input type="text" wire:model.live='title' />
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>
                            <div class="w-full mb-3">
                                <x-input-label for="price" :value="__('Price')" />
                                <x-text-input type="number" step="0.01" wire:model.live='price' />
                                <x-input-error :messages="$errors->get('price')" class="mt-2" />
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-5">
                            <div class="w-full mb-3">
                                <x-input-label for="description" :value="__('Description')" />
                                <x-text-input type="text" wire:model.live='description' />
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>
    
                            <div class="w-full mb-3">
                                <x-input-label for="seo" :value="__('SEO')" />
                                <x-text-input type="text" wire:model.live='seo' />
                                <x-input-error :messages="$errors->get('seo')" class="mt-2" />
                            </div>
                        </div>


                        <div class="grid grid-cols-2 gap-5">
                            <div class="w-full mb-3">
                                <x-input-label for="category" :value="__('Category')" />
                                <x-select id="category" wire:model.live='category'>
                                    <option value="" selected>--Please select Category--</option>
                                    @foreach ($categories as $parent)
                                        <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                    @endforeach
                                </x-select>
                                <x-input-error :messages="$errors->get('category')" class="mt-2" />
                            </div>
                            <div class="w-full mb-3">
                                <x-input-label for="sub_category" :value="__('Sub Category')" />
                                <x-select id="sub_category" wire:model.live='sub_category' :disabled="count($sub_categories) == 0">
                                    @if (count($sub_categories) > 0)
                                        <option value="" selected>--Please select Sub Category--</option>
                                        @foreach ($sub_categories as $sub)
                                            <option value="{{ $sub->id }}">{{ $sub->name }}</option>
                                        @endforeach
                                    @else
                                        <option value="" selected>Select Category first</option>
                                    @endif
                                </x-select>
                                <x-input-error :messages="$errors->get('category')" class="mt-2" />
                            </div>
                        </div>

                        <div class="w-full mb-3">
                            <x-input-label for="image" :value="__('Product Image')" />
                            <x-text-input type="file" accept="image/*" wire:model.live='image' />
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <div class="w-full mb-3" wire:ignore>
                            <x-input-label for="content" :value="__('Content')" />
                            <textarea id="editor" wire:model.live='content'></textarea>
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>
                        <x-primary-button>
                            {{ __('Create') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full">
        @if (count($products))
            <table class="w-full">
                <tr class="bg-gray-100">
                    <th class="p-2 text-start">Image</th>
                    <th class="text-start">StripeID#</th>
                    <th class="text-start">Name</th>
                    <th class="text-start">Stock</th>
                    <th>Price</th>
                    <th class="text-end">Slug</th>
                    <th class="p-2 text-end">Created</th>
                </tr>
                @foreach ($products as $product)
                    <tr class="text-sm odd:bg-gray-50 border-y border-gray-200 text-gray-500">
                        <td class="p-2 text-start"><a href="{{ asset('/storage/'. $product->image) }}" target="_blank"><img class="rounded-full" src="{{ asset('/storage/'. $product->image) }}" width="35px" height="35px"></a></td>
                        <td class="text-start">{{ $product->stripe_id }}</td>
                        <td class="text-start">{{ $product->title }}</td>
                        <td class="text-start font-semibold">
                        @if ($product->stock)
                            <span class="text-blue-600">{{ $product->stock->stock }}</span>
                        @else
                            <span class="text-red-600">Out</span>
                        @endif</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td class="text-end">{{ $product->slug }}</td>
                        <td class="p-2 text-end">{{ $product->created_at->format('D d/m/y H:i:s A') }}</td>
                    </tr>
                @endforeach
            </table>
        @else
            <p class="text-center py-4">No products data found!</p>
        @endif
    </div>
    <script src="//cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.instances.editor.on('change', function() {
            @this.set('content', CKEDITOR.instances.editor.getData());
        });
    </script>
</div>