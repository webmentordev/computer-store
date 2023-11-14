<section class="w-full">
    <h1 class="text-3xl mb-3">Welcome to Dashboard, {{ auth()->user()->name }} 👋</h1>
    <div class="grid grid-cols-4 gap-8">
        <div class="bg-black p-6 rounded-3xl text-white relative">
            <img class="absolute right-3 top-5 opacity-30 rotate-6" width="70" src="https://api.iconify.design/gridicons:product.svg?color=%23ffffff">
            <h2 class="text-2xl mb-2">Total Products</h2>
            <span class="text-white/80 text-3xl">{{ $products }}</span>
        </div>

        <div class="bg-black p-6 rounded-3xl text-white relative">
            <img class="absolute right-3 top-5 opacity-30 rotate-6" width="70" src="https://api.iconify.design/pepicons-pop:dollar-circle.svg?color=%23ffffff">
            <h2 class="text-2xl mb-2">Products Price</h2>
            <span class="text-white/80 text-3xl">${{ $price }}</span>
        </div>
    </div>
</section>
