<!-- Cart card -->
<div class="flex cart-card gap-3 align-items-start bg-gray-50">
    <div class="flex h-full w-full bg-black">
        <img src="{{ $product->featuredImage }}" alt="product image" class="object-cover h-full w-full" />
    </div>
    <div class="d-flex flex-col py-3 pe-4 w-full h-full justify-between gap-2">
        <div class="flex flex-col gap-2">
            <a href="{{ config('urls.product_detail.getPathBuilder')($product->slug) }}">
                <h3 class="text-base md:text-xl font-semibold">
                    {{ $product->title }}
                </h3>
            </a>
            <p class="text-sm">
                Výrobca:
                <a class="text-blue-500" href="/obchod?znacka=oral-b">{{ $product->manufacturer->name }}</a>
            </p>
        </div>
        <div class="flex w-fit gap-2">
            <button class="btn btn-link px-2"j onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                <i class="fas fa-minus"></i>
            </button>

            <input id="form1" min="0" name="quantity" value="2" type="number"
                class="w-[30px] -mr-2 text-center bg-transparent" />

            <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                <i class="fas fa-plus"></i>
            </button>
        </div>
        <div class="flex justify-between items-center">
            <div class="fs-5"> {{ $product->price }} </div>
            <button type="button" class="underline">
                Odstrániť
            </button>
        </div>
    </div>
</div>
