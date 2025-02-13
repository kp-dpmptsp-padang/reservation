@extends('layouts.admin')
@section('title', 'Rekap Kunjungan | DPMPTSP Kota Padang')
@section('content')
<x-table title="Rekap Kunjungan" description="Rekap data kunjungan yang telah ditolak atau selesai.">
  <x-slot name="actions">
    <button
      type="button"
      class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50"
      onclick="openModal('export-visits-modal')"
    >
      Export
    </button>
    @if ($usePagination)
      <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50" href="{{ route('recap.all') }}">
        Lihat Semua
      </a>
    @else
      <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50" href="{{ route('visits.recap') }}">
        Gunakan Pagination
      </a>
    @endif
    <form method="GET" action="{{ route('recap.filter') }}" class="inline-flex items-center gap-x-2">
      <select name="status" class="py-2 px-3 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50">
        <option value="">Filter Status</option>
        <option value="{{ \App\VisitStatusEnum::CANCELLED }}">Ditolak</option>
        <option value="{{ \App\VisitStatusEnum::COMPLETED }}">Selesai</option>
      </select>
      <x-button type="submit" size="sm">
        Filter
      </x-button>
    </form>
  </x-slot>

  <x-slot name="headings">
    <th scope="col" class="px-6 py-3 text-start">
      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
        No
      </span>
    </th>
    <th scope="col" class="px-6 py-3 text-start">
      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
        Institusi
      </span>
    </th>
    <th scope="col" class="px-6 py-3 text-start">
      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
        Tanggal & Waktu
      </span>
    </th>
    <th scope="col" class="px-6 py-3 text-start">
      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
        Ketua Rombongan
      </span>
    </th>
    <th scope="col" class="px-6 py-3 text-start">
      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
        Status
      </span>
    </th>
    <th scope="col" class="px-6 py-3 text-end">
      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
        Aksi
      </span>
    </th>
  </x-slot>

  <x-slot name="rows">
    @foreach ($visits as $index => $visit)
    <tr>
      <td class="px-6 py-3 whitespace-nowrap">
        <span class="text-sm text-gray-800">{{ $loop->iteration }}</span>
      </td>
      <td class="px-6 py-3 whitespace-nowrap">
        <span class="text-sm text-gray-800">{{ $visit->institution }}</span>
      </td>
      <td class="px-6 py-3 whitespace-nowrap">
        <span class="text-sm text-gray-800">{{ $visit->day->format('d-m-Y') }} {{ $visit->clock->format('H:i') }}</span>
      </td>
      <td class="px-6 py-3 whitespace-nowrap">
        <span class="text-sm text-gray-800">{{ $visit->group_leader }}</span>
      </td>
      <td class="px-6 py-3 whitespace-nowrap">
        <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium rounded-full
          @if ($visit->status === \App\VisitStatusEnum::CANCELLED)
            bg-red-100 text-red-800
          @elseif ($visit->status === \App\VisitStatusEnum::COMPLETED)
            bg-green-100 text-green-800
          @endif
        ">
          @if ($visit->status === \App\VisitStatusEnum::CANCELLED)
            Ditolak
          @elseif ($visit->status === \App\VisitStatusEnum::COMPLETED)
            Selesai
          @endif
        </span>
      </td>
      <td class="px-6 py-3 whitespace-nowrap text-end">
        <div class="inline-flex gap-x-2">
          <button type="button" class="text-sm text-blue-600 hover:underline" onclick="openModal('view-visit-{{ $visit->id }}')">Detail</button>
          <button type="button" class="text-sm text-green-600 hover:underline" onclick="openModal('download-visit-{{ $visit->id }}')">Unduh</button>
        </div>
      </td>
    </tr>
    @endforeach
  </x-slot>

  <x-slot name="footer">
    <div class="px-2 py-2">
      @if ($usePagination)
        {{ $visits->withQueryString()->links() }}
      @endif
    </div>
  </x-slot>
</x-table>

<!-- Modals -->
@foreach ($visits as $visit)
  @include('admin.visits.view', ['visit' => $visit])
  @include('admin.visits.download', ['visit' => $visit])
@endforeach

@include('admin.visits.export', ['route' => route('recap.export')])


<script>
  function openModal(modalId) {
    document.getElementById(modalId).classList.add('show');
  }

  function closeModal(modalId) {
    document.getElementById(modalId).classList.remove('show');
  }
</script>
@endsection