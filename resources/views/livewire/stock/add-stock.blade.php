<div class="w-full">
    <div class="flex items-center justify-between mb-3">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ __('Stocks') }}
        </h2>
        <div x-data="{ open: false }">
            <button x-on:click="open = true" class="py-2 px-4 bg-black text-white font-semibold rounded-md">Add Stock</button>
            <div class="fixed top-0 left-0 w-full h-full bg-center bg-white/50 backdrop-blur" x-show="open" x-transition x-cloak>
                <div class="w-full h-full flex items-center justify-center" x-on:click.self="open = false">
                    <form wire:submit='create' class="max-w-2xl p-6 rounded-lg bg-white shadow-lg w-full">
                        <h1 class="text-4xl mb-3">Add New Stock</h1>
                        
                        @if (session('success'))
                            <p class="text-center py-3 text-green-600">{{ session('success') }}</p>
                        @endif

                        <div class="w-full mb-3">
                            <x-input-label for="provider" :value="__('Stock Provider (optional)')" />
                            <x-text-input id="provider" type="text" wire:model='provider' />
                            <x-input-error :messages="$errors->get('provider')" class="mt-2" />
                        </div>

                        <div class="w-full mb-3">
                            <x-input-label for="stock" :value="__('Stock')" />
                            <x-text-input id="stock" type="number" wire:model='stock' />
                            <x-input-error :messages="$errors->get('stock')" class="mt-2" />
                        </div>

                        <div class="w-full mb-3">
                            <x-input-label for="product" :value="__('Product')" />
                            <x-select id="product" wire:model='product' :disabled="count($products) == 0">
                                @if (count($products) > 0)
                                    <option value="" selected>--Please select a product--</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->title }}</option>
                                    @endforeach
                                @else
                                    <option value="" selected>Products are not available</option>
                                @endif
                            </x-select>
                            <x-input-error :messages="$errors->get('product')" class="mt-2" />
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
        <p class="mb-3 text-yellow-500 py-2 pl-3 border-l border-yellow-500 w-full bg-yellow-600/10">Add stock for products in this section. Stock history will also be created so you can check the old stock history, such as what you have added in the past.</p>
        @if (count($stocks))
            <table class="w-full">
                <tr class="bg-gray-100">
                    <th class="text-start p-2">Stock</th>
                    <th class="text-start">Provider</th>
                    <th class="text-start">Product</th>
                    <th class="p-2 text-end">AddedAt</th>
                    <th class="p-2 text-end">LastAdded</th>
                </tr>
                @foreach ($stocks as $stock)
                    <tr class="text-sm odd:bg-gray-50 border-y border-gray-200 text-gray-500">
                        <td class="text-start p-2">{{ $stock->stock }}</td>
                        <td class="text-start">@if ($stock->provider) {{ $stock->provider }} @else Null @endif</td>
                        <td class="text-start">{{ $stock->product->title }}</td>
                        <td class="p-2 text-end">{{ $stock->created_at->format('D d/m/y H:i:s A') }}</td>
                        <td class="p-2 text-end">{{ $stock->updated_at->format('D d/m/y H:i:s A') }}</td>
                    </tr>
                @endforeach
            </table>
        @else
            <p class="text-center py-4">No stocks data found!</p>
        @endif
    </div>
</div>