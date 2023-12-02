<section class="w-full">
    <div class="py-6 px-4">
        <h1 class="mb-6 text-3xl">Daily Arrivals!</h1>
        <div class="grid grid-cols-5 gap-5">
            @foreach ($products as $product)
                <div class="bg-white p-6 rounded-xl shadow-sm hover:-translate-y-3 hover:shadow-lg transition-all">
                    <img src="{{ asset('/storage/'.$product->image) }}" class="h-fit max-h-[300px] object-cover mb-5">
                    <div class="flex flex-col justify-between">
                        <div class="mb-3">
                            <h3>{{ $product->title }}</h3>
                            <span class="font-semibold text-blue-600">US$ {{ number_format($product->price, 2) }}</span>
                        </div>
                        @if ($product->stock)
                            <button class="py-3 px-4 bg-blue-600 text-white font-semibold rounded-lg">Add To Basket</button>
                        @else
                            <span class="py-3 px-4 bg-black text-white font-semibold rounded-lg">Out Of Stock</span>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>