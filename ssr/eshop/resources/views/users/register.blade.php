@extends('layouts.app')

@section('title', config('urls.register.title'))

@section('content')
{{--    <script>--}}
{{--        document.addEventListener("DOMContentLoaded", function() {--}}
{{--            document--}}
{{--                .getElementById("togglePassword")--}}
{{--                .addEventListener("click", function(e) {--}}
{{--                    const password = document.getElementById("password");--}}
{{--                    const type =--}}
{{--                        password.getAttribute("type") === "password" ?--}}
{{--                        "text" :--}}
{{--                        "password";--}}
{{--                    password.setAttribute("type", type);--}}

{{--                    // Optional: Toggle the icon class--}}
{{--                    this.classList.toggle("fa-eye-slash");--}}
{{--                });--}}
{{--        });--}}
{{--    </script>--}}
    <main class="container">
        <div class="flex flex-col justify-center items-center">
            <div class="min-h-[400px] md:min-h-[600px] flex flex-col justify-center items-center gap-8">
                <div class="p-6 bg-backgroundColor md:min-w-[450px] flex flex-column gap-3">
                    <div>
                        <h1 class="text-2xl font-semibold">
                            Vytvoriť účet
                        </h1>
                        <p class="text-secondary">
                            Zadajte prihlasovacie údaje do svojho účtu
                        </p>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4 relative">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" class="block mt-1 w-full"
                                          type="password"
                                          name="password"
                                          required autocomplete="new-password" />
{{--                            <span class="absolute inset-y-0 right-0 flex items-center pr-3">--}}
{{--                <i class="fa fa-eye w-[20px] cursor-pointer" id="togglePassword"></i>--}}
{{--            </span>--}}
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                          type="password"
                                          name="password_confirmation" required />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>

                            <x-primary-button class="ml-4">
                                {{ __('Register') }}
                            </x-primary-button>
                        </div>
                    </form>

{{--                    <script>--}}
{{--                        document.addEventListener("DOMContentLoaded", function() {--}}
{{--                            const togglePassword = document.getElementById("togglePassword");--}}
{{--                            const password = document.getElementById("password");--}}

{{--                            if (togglePassword) {--}}
{{--                                togglePassword.addEventListener("click", function(e) {--}}
{{--                                    const type = password.getAttribute("type") === "password" ? "text" : "password";--}}
{{--                                    password.setAttribute("type", type);--}}

{{--                                    // Optional: Toggle the icon class--}}
{{--                                    this.classList.toggle("fa-eye-slash");--}}
{{--                                });--}}
{{--                            }--}}
{{--                        });--}}
{{--                    </script>--}}
                </div>
                <div>
                    Už máte účet?
                    <a class="font-bold underline" href="{{ config('urls.log_in.url') }}">Prihláste sa</a>
                </div>
            </div>
        </div>
    </main>

@endsection
