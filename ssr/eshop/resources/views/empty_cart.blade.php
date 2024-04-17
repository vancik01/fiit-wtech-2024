@extends('layouts.app')

@section('title', config('urls.cart.title'))

@section('content')
    <div class="container mt-16 flex flex-col gap-3">
        <div class="gap-5 w-full max-w-[1200px] mx-auto">
            <div class="w-100 mb-4">
                <h1 class="fs-1">Košík je prázdny</h1>
                <p class="text-sm">
                    <a href="{{ config('urls.homepage.url') }}#{{ config('urls.homepage.anchors.most_selling') }}"
                        class="text-black text-decoration-underline fw-bold">
                        Pozrite si najpredávanejšie produkty
                    </a>
                </p>
            </div>
        </div>
    </div>
@endsection