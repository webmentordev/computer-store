<section class="w-full">
    <div class="py-6 px-4 max-w-7xl w-full m-auto">
        <h1>Welcome to Home page!</h1>
        <div class="grid grid-cols-6 gap-5">
            @foreach ($products as $product)
                <div>
                    <img src="{{ asset('/storage/'.$product->image) }}">
                </div>
            @endforeach
        </div>
    </div>
</section>
