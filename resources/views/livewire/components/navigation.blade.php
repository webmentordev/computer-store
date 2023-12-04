<nav class="sticky top-0 left-0 bg-white w-full z-50">
    <div class="max-w-full m-auto px-4 py-4 flex items-center justify-between">
        <a href="{{ route('home') }}" class="flex items-center" wire:navigate>
            <img src="{{ asset('assets/pc.png') }}" width="50">
            <span class="text-3xl font-semibold ml-3">Computer Store</span>
        </a>
        <form wire:submit='search' class="max-w-[800px] w-full flex items-center relative 1470px:max-w-[500px]">
            <x-text-input type="search" wire:model.live='search' placeholder="Search by title" />
            <button type="submit" class="bg-blue-600 py-2 px-3 text-white font-semibold ml-3 rounded-lg">Search</button>
            @if (count($products) > 0 && $search !== '')
                <div class="w-full absolute top-12 min-h-[300px] overflow-y-scroll left-0 shadow-lg p-6 bg-white rounded-lg grid-cols-3 grid gap-4 1470px:grid-cols-2">
                    @foreach ($products as $item)
                        <a href="#" class="flex p-3 h-fit rounded-lg">
                            <img class="max-w-[50px] h-fit w-full" src="{{ asset('/storage/'. $item->image) }}" alt="{{ $item->name }} Image">
                            <div class="ml-3">
                                <h4 class="text-gray-600 text-sm font-semibold">{{ $item->title }}</h4>
                                <p>US$<span class="text-blue-600">{{ number_format($item->price, 2) }}</span></p>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        </form>
        <div class="flex flex-col text-start">
            <span class="font-semibold">Monday – Saturday: 11:00 A.M – 6:00 P.M</span>
            <div class="flex">
                <span class="text-blue-500">(0300 0000000)</span>
                @auth
                    <a href="{{ route('dashboard') }}" class="font-bold" wire:navigate> - Dashboard</a>
                @endauth
            </div>
        </div>
    </div>
</nav>