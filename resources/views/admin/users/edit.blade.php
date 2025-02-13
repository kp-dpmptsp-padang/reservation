<x-modal id="edit-user-{{ $user->id }}" title="Edit User">
  <form method="POST" action="{{ route('users.update', $user->id) }}">
    @csrf
    @method('PUT')
    <div class="mt-4">
      <x-input-label for="name" :value="__('Nama')" />
      <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$user->name" required autofocus />
      <x-input-label for="email" :value="__('Email')" class="mt-4" />
      <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$user->email" required />
      <x-input-label for="phone_number" :value="__('Nomor Telepon')" class="mt-4" />
      <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="$user->phone_number" required />
    </div>
    <div class="mt-6 text-right">
      <x-button size="md" variant="secondary" type="button" onclick="closeModal('edit-user-{{ $user->id }}')">Batal</x-button>
      <x-button size="md" type="submit" class="ml-2">Simpan</x-button>
    </div>
  </form>
</x-modal>