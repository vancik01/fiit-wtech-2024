@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
    <!-- intro -->
    <div class="intro d-flex flex-column justify-content-center align-items-center relative" style="height: 320px;">
        <img src="/cover.png" alt="hlavný obrázok" class="w-full h-full ovject-cover">
        <h1 class="absolute text-[#102650]">Introduction Text</h1>
    </div>
    <!-- intro -->

    <!-- telo -->
    <div class="container mt-16 flex flex-col gap-3">
        <!-- ketegorie produktov -->
        <h2>Kategórie produktov</h2>
        <div class="d-flex flex-wrap gap-3">

            @for ($i = 0; $i < 7; $i++)
                @component('components.category_tag', [
                    'category' => (object) ['name' => 'Wocap', 'link' => 'http://example.com'],
                ])
                @endcomponent
            @endfor

        </div>
        <!-- ketegorie produktov -->

        <!-- najpredavanejsie produkty -->
        <div class="flex flex-col gap-2">
            <div class="d-flex justify-content-between mt-5 items-center">
                <h2>Najpredávanejšie produkty</h2>
                <a class="btn btn-link p-0 h-fit text-primaryColor">Zobraziť všetky produkty -></a>
            </div>
            <div class="row row-cols-2 row-cols-lg-4 justify-content-between ">
                @for ($i = 0; $i < 4; $i++)
                    @component('components.product_card', [
                        'product' => (object) [
                            'name' => 'Wocap',
                            'slug' => 'product-slug-123',
                            'thumbnail' => 'https://picsum.photos/300',
                            'status' => 'Na sklade',
                            'manufacturer' => 'Oral-B',
                            'manufacturerSlug' => 'vyrobca-123',
                            'price' => '12.90',
                        ],
                    ])
                    @endcomponent
                @endfor

            </div>
        </div>
        <!-- najpredavanejsie produkty -->

        <!-- najpredavanejsie produkty -->

        <div class="flex flex-col gap-3 mt-12">
            <div class="d-flex justify-content-between mt-5 items-center">
                <h2>Najnovšie produkty</h2>
                <a class="btn btn-link h-fit p-0 text-primaryColor">Zobraziť všetky produkty -></a>
            </div>
            <div class="row row-cols-2 row-cols-lg-4 justify-content-between">
                @for ($i = 0; $i < 4; $i++)
                    @component('components.product_card', [
                        'product' => (object) [
                            'name' => 'Wocap',
                            'slug' => 'product-slug-123',
                            'thumbnail' => 'https://picsum.photos/300',
                            'status' => 'Na sklade',
                            'manufacturer' => 'Oral-B',
                            'manufacturerSlug' => 'vyrobca-123',
                            'price' => '12.90',
                        ],
                    ])
                    @endcomponent
                @endfor
            </div>
        </div>

    </div>
@endsection
