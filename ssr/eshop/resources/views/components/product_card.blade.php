<!-- Product Card -->
<div class="d-flex flex-column gap-3">
    <!-- Product Image -->
    <a href="/product/{{ $product->slug }}">
        <div class="d-flex justify-content-center position-relative">
            <img src="{{ $product->thumbnail }}" alt="Product Image" class="img-fluid w-100" />
            <div class="position-absolute bottom-4 right-4">
                <span class="badge bg-success font-semibold text-sm">{{ $product->status }}</span>
            </div>
        </div>
    </a>

    <!-- Product Info -->
    <div class="d-flex flex-column gap-3">
        <!--<button class="btn btn-success">Na sklade</button>-->
        <div>
            <a href="/product/{{ $product->slug }}">
                <h3>{{ $product->name }}</h3>
            </a>

            <p class="text-secondary text-sm">
                <span>Výrobca:</span>
                <a class="underline" href="/vyrobca/{{ $product->manufacturerSlug }}">
                    {{ $product->manufacturer }}
                </a>
            </p>
        </div>
        <p class="fw-bold">{{ $product->price }}€</p>
    </div>
</div>
