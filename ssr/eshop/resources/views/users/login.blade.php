@extends('layouts.app')

@section('title', config('urls.log_in.title'))

@section('content')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document
                .getElementById("togglePassword")
                .addEventListener("click", function(e) {
                    const password = document.getElementById("password");
                    const type =
                        password.getAttribute("type") === "password" ?
                        "text" :
                        "password";
                    password.setAttribute("type", type);

                    // Optional: Toggle the icon class
                    this.classList.toggle("fa-eye-slash");
                });
        });
    </script>
    <main class="container">
        <div class="flex flex-col justify-center items-center">
            <div class="min-h-[400px] md:min-h-[600px] flex flex-col justify-center items-center gap-8">
                <div class="p-6 bg-backgroundColor md:min-w-[450px] flex flex-column gap-3">
                    <div>
                        <h1 class="text-2xl font-semibold">Prihlásiť sa</h1>
                        <p class="text-secondary">
                            Zadajte prihlasovacie údaje do svojho účtu
                        </p>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Heslo')" />

                            <div class="relative">
                                <x-text-input id="password" class="block mt-1 w-full"
                                              type="password"
                                              name="password"
                                              required autocomplete="current-password" />
                                <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                    <i class="fa fa-eye w-[20px] cursor-pointer" id="togglePassword"></i>
                </span>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Remember Me -->
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Zapamätaj si ma') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                    {{ __('Zabudli ste svoje heslo?') }}
                                </a>
                            @endif

                            <x-primary-button class="ml-3">
                                {{ __('Prihlásiť') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
                <div>
                    Nemáte účet?
                    <a class="font-bold underline" href="{{ config('urls.register.url') }}">Vytvorte si účet</a>
                </div>
            </div>
        </div>
    </main>

@endsection
