<!-- filepath: /d:/Dev/Repos/DPMPTSP/reservation/resources/views/admin/visits/deny.blade.php -->
@props(['visit'])

<x-modal id="deny-visit-{{ $visit->id }}" title="Tolak Kunjungan" size="md">
  <form method="POST" action="{{ route('visits.deny', $visit->id) }}">
    @csrf
    @method('DELETE')
    <div class="modal-body">
      <p>Apakah Anda yakin ingin menolak kunjungan ini?</p>
    </div>
    <div class="modal-footer flex justify-end">
      <x-button type="button" size="sm" variant="secondary" onclick="closeModal('deny-visit-{{ $visit->id }}')">Batal</x-button>
      <x-button type="submit" size="sm" variant="primary">Tolak</x-button>
    </div>
  </form>
</x-modal>