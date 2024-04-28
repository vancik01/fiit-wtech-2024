@extends('layouts.app')

@section('title', config('urls.homepage.title'))

@section('content')
    <main>

        <!-- intro -->
        <div class="intro d-flex flex-column justify-content-center align-items-center relative" style="height: 320px;">
            <img src="/cover.png" alt="hlavný obrázok" class="w-full h-full object-cover">
            <h1 class="absolute text-[#102650]">Introduction Text</h1>
        </div>
        <!-- intro -->

        <!-- telo -->
        <div class="container mt-16 flex flex-col gap-3">
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
            <!-- ketegorie produktov -->
            <h2>Kategórie produktov</h2>
            <div class="d-flex flex-wrap gap-3">
                @foreach ($categories as $category)
                    @component('components.category_tag', [
                        'category' => $category,
                    ])
                    @endcomponent
                @endforeach

            </div>
            <!-- ketegorie produktov -->

            <!-- najpredavanejsie produkty -->
            <div id="{{ config('urls.homepage.anchors.most_selling') }}" class="flex flex-col gap-2">
                <div class="d-flex justify-content-between mt-5 items-center">
                    <h2>Najpredávanejšie produkty</h2>
                    <a href={{ config('urls.shop.url') }} class="btn btn-link p-0 h-fit text-primaryColor hidden md:block">
                        Zobraziť všetky produkty ->
                    </a>
                </div>
                <div class="row row-cols-2 row-cols-lg-4 justify-content-between g-3 g-md-2 ">
                    @foreach ($randomProducts as $product)
                        @component('components.product_card', [
                            'product' => $product,
                        ])
                        @endcomponent
                    @endforeach
                </div>
                <a href={{ config('urls.shop.url') }}
                    class="btn btn-link p-0 h-fit text-primaryColor text-start mt-4 block md:hidden">
                    Zobraziť všetky produkty ->
                </a>
            </div>
            <!-- najpredavanejsie produkty -->

            <!-- najpredavanejsie produkty -->
            <div id="{{ config('urls.homepage.anchors.most_recent') }}" class="flex flex-col gap-3 mt-12">
                <div class="d-flex justify-content-between mt-5 items-center">
                    <h2>Najnovšie produkty</h2>
                    <a href={{ config('urls.shop.url') }}
                        class="btn btn-link h-fit p-0 text-primaryColor hidden md:block">Zobraziť všetky produkty -></a>
                </div>
                <div class="row row-cols-2 row-cols-lg-4 justify-content-between g-3 g-md-2">
                    @foreach ($latestProducts as $product)
                        @component('components.product_card', [
                            'product' => $product,
                        ])
                        @endcomponent
                    @endforeach
                </div>
                <a href={{ config('urls.shop.url') }}
                    class="btn btn-link p-0 h-fit text-primaryColor text-start mt-4 block md:hidden">
                    Zobraziť všetky produkty ->
                </a>
            </div>

        </div>
    </main>
@endsection
