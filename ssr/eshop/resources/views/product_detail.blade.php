@extends('layouts.app')

<!-- Len pre testovacie účely -->
{{-- @php
    $product = (object) [
        'name' => 'Name',
        'slug' => 'product-slug-123',
        'thumbnail' => 'https://picsum.photos/1024',
        'status' => 'Na sklade',
        'manufacturer' => 'Oral-B',
        'manufacturerSlug' => 'vyrobca-123',
        'price' => '99.99',
        'description' =>
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        'shortDescription' =>
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        'category' => 'Category XYZ',
        'gallery' => ['https://picsum.photos/200', 'https://picsum.photos/200', 'https://picsum.photos/200'],
    ];
@endphp --}}



@section('title', config('urls.product_detail.getPathBuilder')('QWER'))

@section('content')
    <script>
        function changeCount(changeBy) {
            const input = document.getElementById("inputNumber");
            if (input) {
                const currentValue = parseInt(input.value, 10) || 0; // Get the current value as number or default to 0
                input.value = currentValue + changeBy < 1 ? 1 : currentValue + changeBy; // Update the input field's value
            } else {
                console.error('Input element not found');
            }
        }
    </script>
    <div class="container pt-5">
        <div class="detail d-flex gap-5 flex-column flex-md-row">
            <div class="d-flex flex-column p-0 col-md-7">
                <img src=" {{ $product->featuredImage }} " alt="{{ $product->title }}"
                    class="max-h-[600px] h-[500px] w-full object-cover" />
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
                    <div class="d-flex flex-row align-items-between">
                        <div class="d-flex flex-row border-1">
                            <button onclick="changeCount(-1)" class="w-[30px] focus:outline-none hover:text-blue-500">
                                -
                            </button>
                            <input id="inputNumber" type="number" min="1" class="d-flex text-center max-w-[60px]"
                                value="2" />
                            <button onclick="changeCount(1)" class="w-[30px] focus:outline-none  hover:text-blue-500">
                                +
                            </button>
                        </div>
                        <button class="btn btn-primary rounded-none">
                            Pridať do košíka
                        </button>
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
                                <img src="{{ $image->imageURL }}" alt="gallery image" class="w-100" />
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
                                    <a href="/kategoria/123">{{ $product->category->name }}</a>
                                </p>
                                <p>
                                    <strong>Výrobca:</strong>
                                    <a href="/kategoria/123">{{ $product->manufacturer->name }}</a>
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
            <button class="btn btn-link">Zobraziť všetky</button>
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
