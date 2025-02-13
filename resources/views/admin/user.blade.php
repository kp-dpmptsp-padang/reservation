@extends('layouts.admin')
@section('title', 'Manajemen Admin | DPMPTSP Kota Padang')
@section('content')
<x-table title="Manajemen Admin" description="Kelola Data Admin.">
  <x-slot name="actions">
    <x-button size="sm" onclick="openModal('create-admin')">+ Tambah</x-button>
  </x-slot>
  <x-slot name="headings">
    <th scope="col" class="px-6 py-3 text-start">
      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
        No
      </span>
    </th>
    <th scope="col" class="px-6 py-3 text-start">
      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
        Nama
      </span>
    </th>
    <th scope="col" class="px-6 py-3 text-start">
      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
        Email
      </span>
    </th>
    <th scope="col" class="px-6 py-3 text-start">
      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
        Nomor Telepon
      </span>
    </th>
    <th scope="col" class="px-6 py-3 text-end">
      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
        Aksi
      </span>
    </th>
  </x-slot>

  <x-slot name="rows">
    @foreach ($users as $index => $user)
    <tr>
      <td class="px-6 py-3 whitespace-nowrap">
        <span class="text-sm text-gray-800">{{ $users->firstItem() + $index }}</span>
      </td>
      <td class="px-6 py-3 whitespace-nowrap">
        <div class="flex items-center gap-x-3">
          <div>
            <span class="block text-sm font-semibold text-gray-800">{{ $user->name }}</span>
          </div>
        </div>
      </td>
      <td class="px-6 py-3 whitespace-nowrap">
        <span class="text-sm text-gray-800">{{ $user->email }}</span>
      </td>
      <td class="px-6 py-3 whitespace-nowrap">
        <span class="text-sm text-gray-800">{{ $user->phone_number }}</span>
      </td>
      <td class="px-6 py-3 whitespace-nowrap text-end">
        <div class="inline-flex gap-x-2">
          <button type="button" class="text-sm text-blue-600 hover:underline" onclick="openModal('view-user-{{ $user->id }}')">Lihat</button>
          <button type="button" class="text-sm text-yellow-600 hover:underline" onclick="openModal('edit-user-{{ $user->id }}')">Edit</button>
          <button type="button" class="text-sm text-red-600 hover:underline" onclick="openModal('delete-user-{{ $user->id }}')">Hapus</button>
        </div>
      </td>
    </tr>
    @endforeach
  </x-slot>

  <x-slot name="footer">
    <div class="px-2 py-2">
      {{ $users->withQueryString()->links() }}
    </div>
  </x-slot>
</x-table>

<!-- Modals -->
@include('admin.users.create')
@foreach ($users as $user)
  @include('admin.users.view', ['user' => $user])
  @include('admin.users.edit', ['user' => $user])
  @include('admin.users.delete', ['user' => $user])
@endforeach

<script>
  function openModal(modalId) {
    document.getElementById(modalId).classList.add('show');
  }

  function closeModal(modalId) {
    document.getElementById(modalId).classList.remove('show');
  }
</script>
@endsection