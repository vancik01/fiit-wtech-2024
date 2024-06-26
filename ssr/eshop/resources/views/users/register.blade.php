@extends('layouts.app')

@section('title', config('urls.register.title'))

@section('content')
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
                            <x-input-label class="!text-black" for="name" :value="__('Meno')" />
                            <x-text-input id="name" class="block mt-1 w-full bg-white p-2 !text-black" type="text"
                                name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label class="!text-black" for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full bg-white p-2 !text-black" type="email"
                                name="email" :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4 relative">
                            <x-input-label class="!text-black" for="password" :value="__('Heslo')" />
                            <x-text-input id="password" class="block mt-1 w-full bg-white p-2 !text-black" type="password"
                                name="password" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-input-label class="!text-black" for="password_confirmation" :value="__('Potvrďte heslo')" />
                            <x-text-input id="password_confirmation" class="block mt-1 w-full bg-white p-2 !text-black"
                                type="password" name="password_confirmation" required />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="!bg-primaryColor !border-none w-full justify-center !p-3">
                                {{ __('Registrovať sa') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
                <div>
                    Už máte účet?
                    <a class="font-bold underline" href="{{ config('urls.log_in.url') }}">Prihláste sa</a>
                </div>
            </div>
        </div>
    </main>

@endsection
