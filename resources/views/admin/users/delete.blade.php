<x-modal id="delete-user-{{ $user->id }}" title="Hapus User">
  <form method="POST" action="{{ route('users.destroy', $user->id) }}">
    @csrf
    @method('DELETE')
    <div class="mt-4">
      <p>Apakah Anda yakin ingin menghapus user ini? Tindakan ini tidak dapat dibatalkan.</p>
    </div>
    <div class="mt-6 text-right">
      <x-button size="md" variant="secondary" type="button" onclick="closeModal('delete-user-{{ $user->id }}')">Batal</x-button>
      <x-button size="md" type="submit" class="ml-2">Hapus</x-button>
    </div>
  </form>
</x-modal>