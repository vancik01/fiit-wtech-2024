<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 ">
            {{ __('Vymazať účet') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Akonáhle je účet vymazaný, všetky dáta budú vymazané. Pred vymazaním sa uistite, že máte všetky potrebné dáta.') }}
        </p>
        <form method="post" action="{{ route('profile.destroy') }}" class="mt-6">
            @csrf
            @method('delete')
            <x-input-label for="update_password_current_password" :value="__('Aktuálne heslo')" />
            <x-text-input id="update_password_current_password" name="current_password" type="password"
                class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
            <br>
            <!-- Button to open the modal -->
            <button type="submit" class="btn bg-red-600 text-white">
                {{ __('Vymazať účet') }}
            </button>
        </form>
    </header>

</section>
