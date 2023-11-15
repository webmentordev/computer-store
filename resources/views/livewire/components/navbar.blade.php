<nav class="w-full h-full">
    <h2 class="text-3xl mb-6">Dashboard</h2>
    <ul class="link pl-3">
        <a wire:navigate href="{{ route('dashboard') }}"><img width="20" src="https://api.iconify.design/file-icons:dashboard.svg"><span>Dashboard</span></a>
        <a wire:navigate href="{{ route('home') }}"><img width="20" src="https://api.iconify.design/noto:house.svg"><span>Home</span></a>
        <a href="{{ route('product.listing') }}"><img width="20" src="https://api.iconify.design/noto-v1:outbox-tray.svg"><span @if (Request::is('admin/products/listing')) class="text-indigo-600" @endif>Products</span></a>
        <div x-data="{ open: false}" class="relative">
            <button class="flex items-center" x-on:click="open = !open"><img width="20" src="https://api.iconify.design/icon-park:tree-list.svg?color=%23000000"><span class="font-semibold ml-2">Categories</span><img width="20" src="https://api.iconify.design/material-symbols:arrow-drop-down-rounded.svg?color=%23000000"></button>
            <div class="shadow-md bg-white p-4 absolute top-6 translate-y-3 left-0 rounded-lg w-full" x-show="open" x-cloak x-transition>
                <a wire:navigate href="{{ route('category.main') }}"><img src="https://api.iconify.design/material-symbols:arrow-right-rounded.svg?color=%23000000" alt=""> Categoryies</a>
                <a wire:navigate href="{{ route('category.sub') }}"><img src="https://api.iconify.design/material-symbols:arrow-right-rounded.svg?color=%23000000" alt=""> Sub Categories</a>
            </div>
        </div>
    </ul>
</nav>