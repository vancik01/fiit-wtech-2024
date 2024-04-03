@extends('layouts.app')

@section('title', config('urls.register.title'))

@section('content')
    <main class="container py-5 flex flex-col gap-8 admin-product-listing">
        <div>
            <h1 class="text-3xl font-bold">Zoznam produktov</h1>
        </div>
        <div>
            <a href="{{ config('urls.admin_new_product.url') }}" class="btn btn-primary">
                Pridať nový produkt
            </a>
        </div>
        <div class="flex flex-col gap-4">
            <div class="product-row heading">
                <div>Názov produktu</div>
                <div>Cena</div>
                <div>Kategória</div>
                <div>Výrobca</div>
                <div>Akcie</div>
            </div>

            @for ($i = 0; $i < 5; $i++)
                @component('components.admin_product_row')
                @endcomponent
            @endfor
        </div>
    </main>

@endsection
