<!-- filepath: /d:/Dev/Repos/DPMPTSP/reservation/resources/views/admin/visits/export.blade.php -->
@props(['route'])

<x-modal id="export-modal" title="Export Data" size="md">
  <div class="p-6 bg-white">
    <p>Apakah Anda yakin ingin mengunduh data ini?</p>
  </div>
  <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end">
    <button
      type="button"
      class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
      onclick="closeModal('export-modal')"
    >
      Batal
    </button>
    <form method="POST" action="{{ $route }}">
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