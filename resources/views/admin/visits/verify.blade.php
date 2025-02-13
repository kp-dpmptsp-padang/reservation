<!-- filepath: /d:/Dev/Repos/DPMPTSP/reservation/resources/views/admin/visits/verify.blade.php -->
@props(['visit'])

<x-modal id="verify-visit-{{ $visit->id }}" title="Verifikasi Kunjungan" size="md">
  <form method="POST" action="{{ route('visits.verify', $visit->id) }}">
    @csrf
    @method('PUT')
    <div class="modal-body">
      <p>Apakah Anda yakin ingin memverifikasi kunjungan ini?</p>
    </div>
    <div class="modal-footer flex justify-end">
      <x-button type="button" size="sm" variant="secondary" onclick="closeModal('verify-visit-{{ $visit->id }}')">Batal</x-button>
      <x-button type="submit" size="sm" variant="primary">Verifikasi</x-button>
    </div>
  </form>
</x-modal>