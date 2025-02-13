@props(['visit'])

<x-modal id="cancel-visit-{{ $visit->id }}" title="Batalkan Kunjungan" size="md">
  <form method="POST" action="{{ route('visits.cancel', $visit->id) }}">
    @csrf
    @method('PUT')
    <div class="modal-body">
      <p>Apakah Anda yakin ingin membatalkan kunjungan ini?</p>
    </div>
    <div class="modal-footer flex justify-end">
      <x-button type="button" size="sm" variant="secondary" onclick="closeModal('cancel-visit-{{ $visit->id }}')">Batal</x-button>
      <x-button type="submit" size="sm" variant="primary">Batalkan</x-button>
    </div>
  </form>
</x-modal>