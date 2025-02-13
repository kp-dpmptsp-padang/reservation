<!-- filepath: /d:/Dev/Repos/DPMPTSP/reservation/resources/views/admin/visits/download.blade.php -->
@props(['visit'])

<x-modal id="download-visit-{{ $visit->id }}" title="Unduh Data Kunjungan" size="md">
  <div class="p-6 bg-white">
    <p>Apakah Anda yakin ingin mengunduh data kunjungan ini?</p>
    <p><strong>Institusi:</strong> {{ $visit->institution }}</p>
    <p><strong>Tanggal & Waktu:</strong> {{ $visit->day->format('d-m-Y') }} {{ $visit->clock->format('H:i') }}</p>
    <p><strong>Ketua Rombongan:</strong> {{ $visit->group_leader }}</p>
  </div>
  <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end">
    <button
      type="button"
      class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
      onclick="closeModal('download-visit-{{ $visit->id }}')"
    >
      Batal
    </button>
    <form method="POST" action="{{ route('visit.export', $visit->id) }}">
      @csrf
      <button
        type="submit"
        class="ml-2 px-4 py-2 text-sm font-medium text-white bg-green-500 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
      >
        Unduh
      </button>
    </form>
  </div>
</x-modal>