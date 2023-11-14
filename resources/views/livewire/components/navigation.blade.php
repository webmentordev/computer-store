<nav class="sticky top-0 left-0 bg-white w-full">
    <div class="max-w-[90%] m-auto px-4 py-4 flex items-center justify-between">
        <a href="{{ route('home') }}" class="flex items-center" wire:navigate>
            <img src="{{ asset('assets/pc.png') }}" width="50">
            <span class="text-3xl font-semibold ml-3">Computer Store</span>
        </a>
        <div class="flex flex-col text-start">
            <span class="font-semibold">Monday – Saturday: 11:00 A.M – 6:00 P.M</span>
            <div class="flex">
                <span class="text-blue-500">(0300 0000000) - </span>
                @auth
                    <a href="{{ route('dashboard') }}" class="font-bold" wire:navigate>Dashboard</a>
                @endauth
            </div>
        </div>
    </div>
</nav>