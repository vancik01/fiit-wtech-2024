<div class="hidden">
    {{ $total = 0 }}
</div>

@extends('layouts.app')

@section('title', config('urls.search_results.title'))

@section('content')
    <main class="container">
        <!-- Content goes here -->
        <div class="d-flex flex-column gap-5 ">
            <div class="d-flex flex-column ">
                <h2>Vysledky vyhľadávania:</h2>
                <p>Hľadaný výraz: "{{ $searchText }}"</p>
            </div>

            <div class="d-flex flex-wrap ">
                @if (sizeof($products) > 0)
                    <div class="row row-cols-2 row-cols-lg-3 g-3">
                        <!-- Product Card -->
                        @foreach ($products as $product)
                            @component('components.product_card', [
                                'product' => $product,
                            ])
                            @endcomponent
                        @endforeach

                    </div>
                @else
                    <div>Žiadne produkty sa nenašli</div>
                @endif
            </div>

        </div>
    </main>
@endsection
