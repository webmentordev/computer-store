<div class="w-full">
    <div class="flex items-center justify-between mb-3">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ __('Stock History') }}
        </h2>
    </div>
    <div class="w-full">
        <p class="mb-3 text-yellow-500 py-2 pl-3 border-l border-yellow-500 w-full bg-yellow-600/10">Stock History is meant to keep track of the stocks you have added into the system. It cannot be updated or deleted. Stock added from the main stock tab is used to add more item stock.</p>
        <x-text-input type="search" class="mb-4" wire:model.live='search' placeholder="Search history by product name..." />
        @if (count($stocks))
            <table class="w-full">
                <tr class="bg-gray-100">
                    <th class="text-start p-2">Stock</th>
                    <th class="text-start">Provider</th>
                    <th class="text-start">Product</th>
                    <th class="p-2 text-end">AddedAt</th>
                </tr>
                @foreach ($stocks as $stock)
                    <tr class="text-sm odd:bg-gray-50 border-y border-gray-200 text-gray-500">
                        <td class="text-start p-2">{{ $stock->stock }}</td>
                        <td class="text-start">@if ($stock->provider) {{ $stock->provider }} @else Null @endif</td>
                        <td class="text-start">{{ $stock->product->title }}</td>
                        <td class="p-2 text-end">{{ $stock->created_at->format('D d/m/y H:i:s A') }}</td>
                    </tr>
                @endforeach
            </table>
        @else
            <p class="text-center py-4">No stocks history data found!</p>
        @endif
    </div>
</div>