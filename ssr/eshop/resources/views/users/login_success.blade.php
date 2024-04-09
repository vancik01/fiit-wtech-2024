@extends('layouts.app')

@section('title', config('urls.log_in_success.title'))

@section('content')
    <main class="container">
        <div class="flex flex-col justify-center items-center">
            <div class="min-h-[400px] md:min-h-[600px] flex flex-col justify-center items-center gap-8">
                <div class="p-6 bg-backgroundColor md:min-w-[450px] flex flex-column gap-3">
                    <div>
                        <h1 class="text-2xl font-semibold">Prihlásenie úspešné</h1>
                        <p class="text-secondary">
                            Úspešne ste sa prihlásili do svojho účtu
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
