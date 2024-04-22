<!-- Cart card -->
<div class="flex flex-col sm:flex-row cart-card align-items-start bg-gray-50">
    <div class="h-full w-full">
        <img src="{{ $product->featuredImage }}" alt="{{ $product->title }}" class="object-contain h-full" />
    </div>
    <div class="d-flex flex-col  w-full h-full justify-between gap-2 p-3 md:p-4">
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
            <form action="{{ route('cart.refresh') }}" method="post"
                onsubmit="event.preventDefault(); this.querySelector('input[type=number]').value = quantity; this.submit();">
                @csrf
                <button type="button" class="btn btn-link px-2"
                    onclick="quantity = parseInt(this.parentNode.querySelector('input[type=number]').value) - 1; if (quantity < 1) quantity = 1; this.parentNode.querySelector('input[type=number]').value = quantity; this.parentNode.submit();">
                    <i class="fas fa-minus"></i>
                </button>

                <input id="form1" min="1" name="quantity[{{ $product->id }}]" value="{{ $quantity }}"
                    type="number" class="w-[30px] -mr-2 text-center bg-transparent" />
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <button type="button" class="btn btn-link px-2"
                    onclick="quantity = parseInt(this.parentNode.querySelector('input[type=number]').value) + 1; this.parentNode.querySelector('input[type=number]').value = quantity; this.parentNode.submit();">
                    <i class="fas fa-plus"></i>
                </button>
            </form>
        </div>
        <div class="flex justify-between items-center">
            <div class="fs-5"> {{ $product->price }} €</div>
            <form action="{{ route('cart.remove') }}" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button class="underline" type="submit">
                    Odstrániť
                </button>
            </form>
        </div>
    </div>
</div>
