@extends('layouts.admin')
@section('title', 'Manajemen Kunjungan | DPMPTSP Kota Padang')
@section('content')
<x-table title="Manajemen Kunjungan" description="Kelola Data Kunjungan.">
  <x-slot name="actions">
    <button
      type="button"
      class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50"
      onclick="openModal('export-visits-modal')"
    >
      Export
    </button>
    @if ($usePagination)
      <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50" href="{{ route('visits.all') }}">
        Lihat Semua
      </a>
    @else
      <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50" href="{{ route('visits.index') }}">
        Gunakan Pagination
      </a>
    @endif
    <form method="GET" action="{{ route('visits.filter') }}" class="inline-flex items-center gap-x-2">
      <select name="status" class="py-2 px-3 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50">
        <option value="">Filter Status</option>
        <option value="{{ \App\VisitStatusEnum::PENDING }}">Menunggu</option>
        <option value="{{ \App\VisitStatusEnum::VERIFIED }}">Terverifikasi</option>
        <option value="{{ \App\VisitStatusEnum::ONGOING }}">Sedang Berlangsung</option>
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
        <span class="text-sm text-gray-800">{{ $usePagination ? $visits->firstItem() + $index : $index + 1 }}</span>
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
          @if ($visit->status === \App\VisitStatusEnum::PENDING)
            bg-yellow-100 text-yellow-800
          @elseif ($visit->status === \App\VisitStatusEnum::ONGOING)
            bg-blue-100 text-blue-800
          @elseif ($visit->status === \App\VisitStatusEnum::VERIFIED)
            bg-teal-100 text-teal-800
          @endif
        ">
          @if ($visit->status === \App\VisitStatusEnum::PENDING)
            <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path d="M8 3.5a.5.5 0 0 1 .5.5v4.793l3.146 3.147a.5.5 0 0 1-.708.708l-3.5-3.5A.5.5 0 0 1 7.5 8V4a.5.5 0 0 1 .5-.5z"/>
            </svg>
            Menunggu
          @elseif ($visit->status === \App\VisitStatusEnum::ONGOING)
            <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </svg>
            Sedang Berlangsung
          @elseif ($visit->status === \App\VisitStatusEnum::VERIFIED)
            <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </svg>
            Terverifikasi
          @endif
        </span>
      </td>
      <td class="px-6 py-3 whitespace-nowrap text-end">
        <div class="inline-flex gap-x-2">
          <button type="button" class="text-sm text-blue-600 hover:underline" onclick="openModal('view-visit-{{ $visit->id }}')">Detail</button>
          @if ($visit->status === \App\VisitStatusEnum::PENDING)
            <button type="button" class="text-sm text-red-600 hover:underline" onclick="openModal('deny-visit-{{ $visit->id }}')">Tolak</button>
            <button type="button" class="text-sm text-green-600 hover:underline" onclick="openModal('verify-visit-{{ $visit->id }}')">Verifikasi</button>
            <button type="button" class="text-sm text-yellow-600 hover:underline" onclick="openModal('edit-visit-{{ $visit->id }}')">Edit</button>
          @elseif ($visit->status === \App\VisitStatusEnum::VERIFIED || $visit->status === \App\VisitStatusEnum::ONGOING)
            <button type="button" class="text-sm text-red-600 hover:underline" onclick="openModal('cancel-visit-{{ $visit->id }}')">Batalkan</button>
            <button type="button" class="text-sm text-green-600 hover:underline" onclick="openModal('download-visit-{{ $visit->id }}')">Unduh</button>
          @endif
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
  @include('admin.visits.edit', ['visit' => $visit])
  @include('admin.visits.verify', ['visit' => $visit])
  @include('admin.visits.cancel', ['visit' => $visit])
  @include('admin.visits.deny', ['visit' => $visit])
  @include('admin.visits.download', ['visit' => $visit])
@endforeach

@include('admin.visits.export', ['route' => route('visits.export')])

<script>
  function openModal(modalId) {
    document.getElementById(modalId).classList.add('show');
  }

  function closeModal(modalId) {
    document.getElementById(modalId).classList.remove('show');
  }
</script>
@endsection