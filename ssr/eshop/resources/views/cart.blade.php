<div class="hidden">
    {{ $total = 0 }}
</div>

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
                        {{ $cart }}
                        <hr>
                        {{ $products }}
                    @endif
                </div>
                <div class="col-12 col-md-6 md:max-w-[450px] flex flex-col gap-8 bg-gray-50 h-fit p-8">
                    <h2 class="text-2xl font-semibold">
                        Detail objednávky
                    </h2>

                    <div class="flex flex-col gap-3">
                        <div class="flex justify-between items-center">
                            <div>Medzisúčet</div>
                            <div>{{ $total }}€</div>
                        </div>
                        <div class="flex justify-between items-center">
                            <div>Doprava</div>
                            <div>4.50€</div>
                        </div>
                        <div class="h-[1px] bg-black"></div>
                        <div class="flex justify-between items-center">
                            <div>Spolu</div>
                            <div>{{ $total += 4.5 }}€</div>
                        </div>
                    </div>

                    <button type="submit" class="p-[10px] bg-black text-white">
                        Pokračovať k objednávke
                    </button>
                </div>
            </div>

        </div>
    </div>
@endsection
