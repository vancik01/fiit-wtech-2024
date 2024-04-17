@extends('layouts.app')

@section('title', config('urls.cart.title'))

@section('content')
    <div class="container mt-16 flex flex-col gap-3">
        <div class="gap-5 w-full max-w-[1200px] mx-auto">
            <div class="w-100 mb-4">
                <h1 class="fs-1">Košík</h1>
                <p class="text-sm">
                    Chcete pokračovať v nákupe?
                    <a href="{{ config('urls.homepage.url') }}#{{ config('urls.homepage.anchors.most_selling') }}"
                        class="text-black text-decoration-underline fw-bold">
                        Pozrite si najpredávanejšie produkty
                    </a>
                </p>
            </div>

            <div class="row gap-5 flex justify-between">
                <div class="col-12 col-md-6 max-w-[600px] flex flex-col gap-10 p-0">
                    @if ($cart)
                        @foreach ($products as $product)
                            <div>
                                @component('components.product_in_cart', [
                                    'cart' => $cart,
                                    'product' => $product,
                                    'quantity' => $product->pivot->quantity,
                                ])
                                @endcomponent
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="col-12 col-md-6 md:max-w-[450px] flex flex-col gap-8 bg-gray-50 h-fit p-8">
                    <h2 class="text-2xl font-semibold">
                        Spolu
                    </h2>

                    <div class="flex flex-col gap-3">
                        <div class="flex justify-between items-center">
                            <div>Suma</div>
                            <div>{{ $total }}€</div>
                        </div>
                    </div>

                    <button type="submit" class="p-[10px] bg-black text-white ">
                        <a href="{{ route('checkout') }}" class="text-decoration-none text-white ">Pokračovať k objednávke</a>
                    </button>
                </div>
            </div>

        </div>
    </div>
@endsection