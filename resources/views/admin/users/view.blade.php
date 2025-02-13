<x-modal id="view-user-{{ $user->id }}" title="Detail User">
  <div class="mt-4">
    <p><strong>Nama:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Nomor Telepon:</strong> {{ $user->phone_number }}</p>
  </div>
  <div class="mt-6 text-right">
    <x-button size="md" variant="secondary" type="button" onclick="closeModal('view-user-{{ $user->id }}')">Tutup</x-button>
  </div>
</x-modal>