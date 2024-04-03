<!-- Product Card -->
<div class="d-flex flex-column gap-3 items-stretch justify-between">
    <!-- Product Image -->
    <div class="flex flex-col gap-3">
        <a href="{{ config('urls.product_detail.getPathBuilder')($product->slug) }}">
            <div class="d-flex justify-content-center position-relative">
                <img src="{{ $product->featuredImage }}" alt="Product Image" class="object-cover w-100 aspect-square" />
                <div class="position-absolute bottom-4 right-4">
                    <span class="badge bg-success font-semibold text-sm">{{ $product->availability }}</span>
                </div>
            </div>
        </a>
        <a href="{{ config('urls.product_detail.getPathBuilder')($product->slug) }}">
            <h3>{{ $product->title }}</h3>
        </a>
    </div>

    <!-- Product Info -->
    <div class="d-flex flex-column gap-2">
        <p class="text-secondary text-sm">
            <span>Výrobca:</span>
            <a class="underline" href="/vyrobca/{{ $product->manufacturer->slug }}">
                {{ $product->manufacturer->name }}
            </a>
        </p>
        <p class="fw-bold">{{ $product->price }}€</p>
    </div>
</div>
