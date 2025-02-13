@props(['visit'])

<x-modal id="view-visit-{{ $visit->id }}" title="Detail Kunjungan" size="xl">
  <div class="p-6 bg-white">
    <!-- Header dengan institusi sebagai highlight -->
    <div class="mb-6 pb-4 border-b border-gray-200">
      <h3 class="text-xl font-medium text-gray-900">{{ $visit->institution }}</h3>
      <p class="mt-1 text-sm text-gray-500">
        {{ $visit->day->format('d F Y') }} • {{ $visit->clock->format('H:i') }} WIB
      </p>
    </div>

    <!-- Grid layout untuk informasi utama -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
      <!-- Informasi Rombongan -->
      <div class="bg-gray-50 p-4 rounded-lg">
        <h4 class="text-sm font-medium text-gray-500 mb-3">Informasi Rombongan</h4>
        <div class="space-y-3">
          <div class="flex flex-col">
            <span class="text-sm text-gray-500">Ketua Rombongan</span>
            <span class="font-medium text-gray-900">{{ $visit->group_leader }}</span>
          </div>
          <div class="flex flex-col">
            <span class="text-sm text-gray-500">Jumlah Anggota</span>
            <span class="font-medium text-gray-900">{{ $visit->group_size }} orang</span>
          </div>
        </div>
      </div>

      <!-- Status Kunjungan -->
      <div class="bg-gray-50 p-4 rounded-lg">
        <h4 class="text-sm font-medium text-gray-500 mb-3">Status Kunjungan</h4>
        <div class="space-y-3">
          <div class="flex items-center">
            @switch($visit->status)
              @case(\App\VisitStatusEnum::PENDING)
                <span class="px-3 py-1 text-sm rounded-full bg-yellow-100 text-yellow-800">
                  Menunggu
                </span>
                @break
              @case(\App\VisitStatusEnum::VERIFIED)
                <span class="px-3 py-1 text-sm rounded-full bg-blue-100 text-blue-800">
                  Terverifikasi
                </span>
                @break
              @case(\App\VisitStatusEnum::ONGOING)
                <span class="px-3 py-1 text-sm rounded-full bg-green-100 text-green-800">
                  Sedang Berlangsung
                </span>
                @break
              @case(\App\VisitStatusEnum::COMPLETED)
                <span class="px-3 py-1 text-sm rounded-full bg-gray-100 text-gray-800">
                  Selesai
                </span>
                @break
              @case(\App\VisitStatusEnum::CANCELLED)
                <span class="px-3 py-1 text-sm rounded-full bg-red-100 text-red-800">
                  Dibatalkan
                </span>
                @break
              @default
                <span class="px-3 py-1 text-sm rounded-full bg-gray-100 text-gray-800">
                  Tidak Diketahui
                </span>
            @endswitch
          </div>
          @if (in_array($visit->status, [\App\VisitStatusEnum::VERIFIED, \App\VisitStatusEnum::ONGOING]) && $visit->verified_at)
            <div class="flex flex-col">
              <span class="text-sm text-gray-500">Diverifikasi Pada</span>
              <span class="font-medium text-gray-900">{{ $visit->verified_at->format('d F Y • H:i') }}</span>
            </div>
          @endif
        </div>
      </div>
    </div>

    <!-- Informasi Detail -->
    <div class="bg-gray-50 p-4 rounded-lg mb-6">
      <h4 class="text-sm font-medium text-gray-500 mb-3">Detail Kunjungan</h4>
      <div class="space-y-4">
        <div class="flex flex-col">
          <span class="text-sm text-gray-500">Topik</span>
          <span class="font-medium text-gray-900">{{ $visit->topic }}</span>
        </div>
        <div class="flex flex-col">
          <span class="text-sm text-gray-500">Deskripsi</span>
          <span class="font-medium text-gray-900">{{ $visit->description }}</span>
        </div>
      </div>
    </div>

    <!-- Informasi Kontak -->
    <div class="bg-gray-50 p-4 rounded-lg mb-6">
      <h4 class="text-sm font-medium text-gray-500 mb-3">Informasi Kontak</h4>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="flex flex-col">
          <span class="text-sm text-gray-500">Alamat</span>
          <span class="font-medium text-gray-900">{{ $visit->address }}</span>
        </div>
        <div class="flex flex-col">
          <span class="text-sm text-gray-500">Homestay</span>
          <span class="font-medium text-gray-900">{{ $visit->homestay }}</span>
        </div>
        <div class="flex flex-col">
          <span class="text-sm text-gray-500">Provinsi</span>
          <span class="font-medium text-gray-900">{{ $visit->province->name }}</span>
        </div>  
        <div class="flex flex-col"> 
          <span class="text-sm text-gray-500">Kota</span>
          <span class="font-medium text-gray-900">{{ $visit->city->name}}</span>
        </div>
        <div class="flex flex-col">
          <span class="text-sm text-gray-500">Email</span>
          <span class="font-medium text-gray-900">{{ $visit->email }}</span>
        </div>
        <div class="flex flex-col">
          <span class="text-sm text-gray-500">Nomor Telepon</span>
          <span class="font-medium text-gray-900">{{ $visit->phone_number }}</span>
        </div>
        <div class="flex flex-col">
          <span class="text-sm text-gray-500">WhatsApp</span>
          <span class="font-medium text-gray-900">{{ $visit->whatsapp_number }}</span>
        </div>
      </div>
    </div>

    <!-- Attachment Section -->
    @if ($visit->attachment_path)
      <div class="bg-gray-50 p-4 rounded-lg">
        <h4 class="text-sm font-medium text-gray-500 mb-3">Lampiran</h4>
        <a 
          href="{{ asset('storage/' . $visit->attachment_path) }}" 
          target="_blank" 
          class="inline-flex items-center px-4 py-2 text-sm font-medium text-blue-700 bg-blue-50 rounded-md hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#00D5BE]"
        >
          <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
          </svg>
          Lihat Lampiran
        </a>
      </div>
    @endif
  </div>

  <!-- Footer -->
  <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
    <div class="flex justify-end">
      <button
        type="button"
        class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#00D5BE]"
        onclick="closeModal('view-visit-{{ $visit->id }}')"
      >
        Tutup
      </button>
    </div>
  </div>
</x-modal>