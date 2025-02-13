<!-- filepath: /d:/Dev/Repos/DPMPTSP/reservation/resources/views/admin/visits/edit.blade.php -->
@props(['visit'])

<x-modal id="edit-visit-{{ $visit->id }}" title="Edit Kunjungan" size="lg">
  <form method="POST" action="{{ route('visits.update', $visit->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal-body">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="flex flex-col">
          <label for="name" class="text-sm text-gray-500">Nama</label>
          <input type="text" name="name" id="name" class="form-input" value="{{ $visit->name }}" required>
        </div>
        <div class="flex flex-col">
          <label for="institution" class="text-sm text-gray-500">Institusi</label>
          <input type="text" name="institution" id="institution" class="form-input" value="{{ $visit->institution }}" required>
        </div>
        <div class="flex flex-col">
          <label for="phone_number" class="text-sm text-gray-500">Nomor Telepon</label>
          <input type="text" name="phone_number" id="phone_number" class="form-input" value="{{ $visit->phone_number }}" required>
        </div>
        <div class="flex flex-col">
          <label for="whatsapp_number" class="text-sm text-gray-500">Nomor WhatsApp</label>
          <input type="text" name="whatsapp_number" id="whatsapp_number" class="form-input" value="{{ $visit->whatsapp_number }}" required>
        </div>
        <div class="flex flex-col">
          <label for="email" class="text-sm text-gray-500">Email</label>
          <input type="email" name="email" id="email" class="form-input" value="{{ $visit->email }}" required>
        </div>
        <div class="flex flex-col">
          <label for="province" class="text-sm text-gray-500">Provinsi</label>
          <input type="text" name="province" id="province" class="form-input" value="{{ $visit->province }}" required>
        </div>
        <div class="flex flex-col">
          <label for="city" class="text-sm text-gray-500">Kota</label>
          <input type="text" name="city" id="city" class="form-input" value="{{ $visit->city }}" required>
        </div>
        <div class="flex flex-col">
          <label for="address" class="text-sm text-gray-500">Alamat</label>
          <input type="text" name="address" id="address" class="form-input" value="{{ $visit->address }}" required>
        </div>
        <div class="flex flex-col">
          <label for="homestay" class="text-sm text-gray-500">Homestay</label>
          <input type="text" name="homestay" id="homestay" class="form-input" value="{{ $visit->homestay }}" required>
        </div>
        <div class="flex flex-col">
          <label for="day" class="text-sm text-gray-500">Tanggal</label>
          <input type="date" name="day" id="day" class="form-input" value="{{ $visit->day->format('Y-m-d') }}" required>
        </div>
        <div class="flex flex-col">
          <label for="clock" class="text-sm text-gray-500">Waktu</label>
          <input type="time" name="clock" id="clock" class="form-input" value="{{ $visit->clock->format('H:i') }}" required>
        </div>
        <div class="flex flex-col">
          <label for="topic" class="text-sm text-gray-500">Topik</label>
          <input type="text" name="topic" id="topic" class="form-input" value="{{ $visit->topic }}" required>
        </div>
        <div class="flex flex-col">
          <label for="group_size" class="text-sm text-gray-500">Jumlah Anggota</label>
          <input type="number" name="group_size" id="group_size" class="form-input" value="{{ $visit->group_size }}" required>
        </div>
        <div class="flex flex-col">
          <label for="group_leader" class="text-sm text-gray-500">Ketua Rombongan</label>
          <input type="text" name="group_leader" id="group_leader" class="form-input" value="{{ $visit->group_leader }}" required>
        </div>
        <div class="flex flex-col">
          <label for="description" class="text-sm text-gray-500">Deskripsi</label>
          <textarea name="description" id="description" class="form-input">{{ $visit->description }}</textarea>
        </div>
        <div class="flex flex-col">
          <label for="letter_file" class="text-sm text-gray-500">File Surat</label>
          <input type="file" name="letter_file" id="letter_file" class="form-input">
        </div>
      </div>
    </div>
    <div class="modal-footer flex justify-end">
      <x-button type="button" size="sm" variant="secondary" onclick="closeModal('edit-visit-{{ $visit->id }}')">Batal</x-button>
      <x-button type="submit" size="sm" variant="primary">Simpan</x-button>
    </div>
  </form>
</x-modal>