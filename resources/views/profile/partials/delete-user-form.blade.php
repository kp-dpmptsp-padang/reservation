<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Hapus Akun') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Setelah akun Anda dihapus, semua data Anda akan dihapus secara permanen. Harap unduh data apa pun yang ingin Anda simpan sebelum menghapus akun Anda.') }}
        </p>
    </header>

    <x-button type="button" onclick="openModal('delete-account-modal')">
        {{ __('Hapus Akun') }}
    </x-button>

    <x-modal id="delete-account-modal" title="Hapus Akun">
        <form method="POST" action="{{ route('profile.destroy') }}">
            @csrf
            @method('DELETE')

            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" name="password" type="password" class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}" />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 text-right">
                <x-button type="button" onclick="closeModal('delete-account-modal')">
                    {{ __('Batal') }}
                </x-button>

                <x-button type="submit" class="ml-2">
                    {{ __('Hapus Akun') }}
                </x-button>
            </div>
        </form>
    </x-modal>
</section>