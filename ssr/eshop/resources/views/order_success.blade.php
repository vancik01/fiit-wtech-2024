@extends('layouts.app')

@section('title', config('urls.order_success.title'))

@section('content')
    <div class="container mt-16 flex flex-col gap-3">
        <h2>Objednávka číslo {{$order}} bola úspešne odoslaná</h2>
        <p>Ďakujeme za vašu objednávku. Čoskoro vás budeme kontaktovať ohľadom ďalších krokov.</p>
    </div>
@endsection