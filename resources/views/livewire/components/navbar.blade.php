<nav class="w-full h-full">
    <h2 class="text-3xl mb-6">Dashboard</h2>
    <ul class="link pl-3">
        <a wire:navigate href="{{ route('dashboard') }}"><img width="20" src="https://api.iconify.design/file-icons:dashboard.svg"><span>Dashboard</span></a>
        <a wire:navigate href="{{ route('home') }}"><img width="20" src="https://api.iconify.design/noto:house.svg"><span>Home</span></a>
        <a wire:navigate href="{{ route('product.listing') }}"><img width="20" src="https://api.iconify.design/noto-v1:outbox-tray.svg"><span @if (Request::is('admin/products/listing')) class="text-indigo-600" @endif>Products</span></a>
    </ul>
</nav>