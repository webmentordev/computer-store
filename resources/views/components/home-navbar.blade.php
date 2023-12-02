<div class="p-6 max-w-[300px] w-full">
    <div class="bg-white rounded-xl p-3">
        <div class="flex items-center bg-blue-600 rounded-full w-full p-2 px-3">
            <img src="https://api.iconify.design/iconamoon:menu-burger-horizontal.svg?color=%23ffffff" width="25" alt="Burger Icon">
            <span class="text-white ml-3">Departments</span>
        </div>
        @if (count($categories))
            <ul>
                @foreach ($categories as $item)
                    <div class="group relative p-3 font-semibold w-full flex items-center">
                        <div class="w-full">
                            <a href="/product-category/{{ $item->slug }}">{{ $item->name }}</a>
                            @if (count($item->subcategory))
                                <div class="absolute hidden max-w-[400px] z-10 w-full border border-gray-100 p-3 px-5 shadow-sm bg-white rounded-lg -right-[200px] top-0 group-hover:block">
                                    <ul class="flex flex-col">
                                        @foreach ($item->subcategory as $sub)
                                            <a class="py-2 w-full" href="/product-category/{{ $item->slug }}/{{ $sub->slug }}">{{ $sub->name }}</a>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <img src="https://api.iconify.design/radix-icons:caret-right.svg?color=%23242424" alt="Caret right">
                    </div>
                @endforeach
            </ul>
        @endif
    </div>
</div>