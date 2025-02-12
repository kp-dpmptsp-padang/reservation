<x-modal id="create-admin" title="Tambah Admin">
  <form method="POST" action="{{ route('users.store') }}">
    @csrf
    <div class="mt-4">
      <x-input-label for="name" :value="__('Nama')" />
      <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus />
      <x-input-label for="email" :value="__('Email')" class="mt-4" />
      <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" required />
      <x-input-label for="phone_number" :value="__('Nomor Telepon')" class="mt-4" />
      <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" required />
      <x-input-label for="password" :value="__('Password')" class="mt-4" />
      <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
      <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" class="mt-4" />
      <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
    </div>
    <div class="mt-6 text-right">
      <x-button size="md" variant="secondary" type="button" onclick="closeModal('create-admin')">Batal</x-button>
      <x-button size="md" type="submit" class="ml-2">Simpan</x-button>
    </div>
  </form>
</x-modal>