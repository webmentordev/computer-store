<div class="w-full">
    <div class="flex items-center justify-between mb-3">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ __('Category Listing') }}
        </h2>
        <div x-data="{ open: false }">
            <button x-on:click="open = true" class="py-2 px-4 bg-black text-white font-semibold rounded-md">Create Category</button>
            <div class="fixed top-0 left-0 w-full h-full bg-center bg-white/50 backdrop-blur" x-show="open" x-transition x-cloak>
                <div class="w-full h-full flex items-center justify-center" x-on:click.self="open = false">
                    <form wire:submit='create' class="max-w-2xl p-6 rounded-lg bg-white shadow-lg w-full">
                        <h1 class="text-4xl mb-3">Create Category</h1>
                        
                        @if (session('success'))
                            <p class="text-center py-3 text-green-600">{{ session('success') }}</p>
                        @endif

                        <div class="w-full mb-3">
                            <x-input-label for="name" :value="__('Category Name')" />
                            <x-text-input id="name" type="text" wire:model.live='name' />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
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
        @if (count($categories))
            <table class="w-full">
                <tr class="bg-gray-100">
                    <th class="text-start p-2">Name</th>
                    <th class="text-start">Slug</th>
                    <th class="text-start">SubCategories</th>
                    <th class="text-start">Products</th>
                    <th class="p-2 text-end">Created</th>
                </tr>
                @foreach ($categories as $category)
                    <tr class="text-sm odd:bg-gray-50 border-y border-gray-200 text-gray-500">
                        <td class="text-start p-2">{{ $category->name }}</td>
                        <td class="text-start">{{ $category->slug }}</td>
                        <td class="text-start">{{ $category->subcategory_count }}</td>
                        <td class="text-start">{{ $category->products_count }}</td>
                        <td class="p-2 text-end">{{ $category->created_at->format('D d/m/y H:i:s A') }}</td>
                    </tr>
                @endforeach
            </table>
        @else
            <p class="text-center py-4">No categories data found!</p>
        @endif
    </div>
</div>