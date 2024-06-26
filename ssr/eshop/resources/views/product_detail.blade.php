@extends('layouts.app')

@section('title', $product->title)

@section('content')
    <script>
        function changeCount(e, amount) {
            e.preventDefault();
            var inputNumber = document.getElementById('inputNumber');
            var newQuantity = parseInt(inputNumber.value) + amount;
            inputNumber.value = newQuantity < 1 ? 1 : newQuantity;
            document.getElementById('quantity').value = inputNumber.value;
        }
    </script>

    <div class="container pt-5">
        @if (session('success'))
            <div class="alert alert-success">
                <h4>{{ session('success') }}</h4>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                <h4>{{ session('error') }}</h4>
            </div>
        @endif
        <div class="detail d-flex gap-5 flex-column flex-md-row">
            <div class="d-flex flex-column p-0 col-md-7">
                <img src=" {{ $product->featuredImage }} " alt="{{ $product->title }}"
                    class="max-h-[600px] md:h-[500px] w-full object-cover" />
            </div>
            <div class="d-flex flex-column gap-5 p-2 col-md-5">
                <div class="d-flex flex-column h-100 justify-content-center gap-6">
                    <div class="d-flex flex-column">
                        <img src="{{ $product->manufacturer->image }}" alt="výrobca"
                            class="max-w-[100px] h-[70px] object-cover">
                        <h2 class="text-4xl mb-2 font-semibold">{{ $product->title }}</h2>
                        <p class="">{{ $product->status }}</p>
                    </div>

                    <div class="d-flex flex-column">
                        <div class="d-flex flex-column">
                            <h4 class="text-secondary text-2xl mb-2">{{ $product->price }}€</h4>
                        </div>
                        <p>
                            {{ $product->shortDescription }}
                        </p>
                    </div>
                    <div class="">

                        @if ($product->availability == 'OUT_OF_STOCK')
                            <button class="btn btn-secondary rounded-none" disabled>
                                Produkt momentálne nie je skladom
                            </button>
                        @else
                            <div class="d-flex flex-row align-items-between">
                                <div class="d-flex flex-row border-1">
                                    <button onclick="changeCount(event, -1)"
                                        class="w-[30px] focus:outline-none hover:text-blue-500">
                                        -
                                    </button>
                                    <input id="inputNumber" type="number" min="1"
                                        class="d-flex text-center max-w-[60px]" value="1" />
                                    <button onclick="changeCount(event, 1)"
                                        class="w-[30px] focus:outline-none  hover:text-blue-500">
                                        +
                                    </button>
                                </div>

                                <div>
                                    <form action="{{ route('cart.add') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" id="quantity" name="quantity" value="1">
                                        <button class="btn btn-primary rounded-none" type="submit">
                                            Pridať do košíka
                                        </button>
                                    </form>

                                </div>
                            </div>

                            <div>
                                @if ($isInCart)
                                    <div class="flex flex-col  gap-2 mt-2">
                                        <p>Produkt sa nachádza v košíku {{ $cartQuantity }}-krát</p>
                                        <form action="{{ route('cart.remove') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button class="underline" type="submit">
                                                Odstrániť z košíka
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex product-detail pt-5">
            <div class="d-flex flex-column gap-16">
                <div class="d-flex flex-column">
                    <h2 class="text-4xl mb-2 font-semibold">Informácie o produkte</h2>
                    <p>
                        {{ $product->longDescription }}
                    </p>
                </div>
                <div class="d-flex flex-column">
                    <h2 class="text-4xl mb-2 font-semibold">Galéria</h2>
                    <div class="row row-cols-md-3 row-cols-2 g-2 ">
                        @foreach ($product->galleryImages as $image)
                            <div class="col">
                                <img src="{{ $image->imageURL }}" alt="gallery image"
                                    class="w-100 object-cover aspect-square" />
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <div class="d-flex flex-column">
                        <div class="d-flex flex-column">
                            <h2 class="text-3xl mb-2 font-semibold">Ďalšie informácie</h2>
                            <div class="flex flex-col gap-2">
                                <p>
                                    <strong>Kategória produktu:</strong>
                                    <a
                                        href="{{ config('urls.category_archive.getPathBuilder')($product->category->slug) }}">>
                                        {{ $product->category->name }}</a>
                                </p>
                                <p>
                                    <strong>Výrobca:</strong>
                                    <a
                                        href="{{ config('urls.manufacturer_archive.getPathBuilder')($product->manufacturer->slug) }}">
                                        {{ $product->manufacturer->name }}
                                    </a>
                                </p>
                            </div>
                            <!-- Add more details as required -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between mt-5">
            <h2 class="text-2xl font-semibold">Podobné produkty</h2>
            <a class="btn btn-link" href="{{ config('urls.shop.url') }}">Zobraziť všetky</a>
        </div>
        <div class="row row-cols-2 row-cols-lg-4 justify-content-between">

            @foreach ($featuredProducts as $featuredProduct)
                @component('components.product_card', [
                    'product' => $featuredProduct,
                ])
                @endcomponent
            @endforeach


        </div>
    </div>
@endsection
