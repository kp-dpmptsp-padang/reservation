@extends('layouts.main')
@section('title', 'Reservasi | DPMPTSP Kota Padang')
@section('content')

    <div class="relative">
        <div class="absolute inset-0 transform scale-105">
            <img src="{{ asset('/images/bg-4.jpg') }}" alt="DPMPTSP Background"
                class="w-full h-full object-cover filter brightness-75">
            <div class="absolute inset-0 bg-gradient-to-b from-gray-900/70 via-teal-900/60 to-teal-800/80"></div>
        </div>

        <div class="relative pb-32">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-24 pb-8">
                <h1 class="text-4xl text-center font-extrabold text-white tracking-tight drop-shadow-lg">
                    Registrasi Kunjungan
                </h1>
                <p class="mt-4 text-xl text-white/90 drop-shadow-lg text-center">
                    Silakan lengkapi formulir di bawah ini untuk melakukan reservasi kunjungan.
                </p>
            </div>
        </div>
    </div>

    <div class="relative -mt-32 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="p-8">
                    <form id="reservationForm" action="{{ route('visits.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                        @csrf
                        <div class="bg-blue-50 p-4 rounded-lg mb-6 border border-blue-200">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-blue-800">Informasi Pengisian Form</h3>
                                    <p class="mt-1 text-sm text-blue-600">Field yang ditandai dengan <span class="text-red-500">*</span> wajib diisi</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 shadow-sm">
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Data Pemohon</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <x-input-label value="Nama Lengkap" required />
                                    <div class="relative mt-1">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <input type="text" name="name" id="name" 
                                            class="block w-full pl-10 rounded-lg border-gray-300 shadow-sm focus:ring-[#00D5BE] focus:border-[#00D5BE]">
                                    </div>
                                </div>
                                
                                <div>
                                    <x-input-label value="Nama Instansi Pemohon" required />
                                    <div class="relative mt-1">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                            </svg>
                                        </div>
                                        <input type="text" name="institution" id="institution" 
                                            class="block w-full pl-10 rounded-lg border-gray-300 shadow-sm focus:ring-[#00D5BE] focus:border-[#00D5BE]">
                                    </div>
                                </div>
                                
                                <div>
                                    <x-input-label value="Nomor WhatsApp (yang bisa dihubungi)" required />
                                    <div class="relative mt-1">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                            </svg>
                                        </div>
                                        <input type="tel" name="whatsapp_number" id="whatsapp_number" 
                                            class="block w-full pl-10 rounded-lg border-gray-300 shadow-sm focus:ring-[#00D5BE] focus:border-[#00D5BE]">
                                    </div>
                                </div>

                                <div>
                                    <x-input-label value="Email Instansi/Lembaga/Pemohon" required />
                                    <div class="relative mt-1">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <input type="email" name="email" id="email" 
                                            class="block w-full pl-10 rounded-lg border-gray-300 shadow-sm focus:ring-[#00D5BE] focus:border-[#00D5BE]">
                                    </div>
                                </div>
                                
                                <div>
                                    <x-input-label value="Provinsi" required />
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                                <circle cx="12" cy="10" r="3"></circle>
                                            </svg>
                                        </div>
                                        <select name="province_id" id="province" 
                                            class="mt-1 block w-full pl-10 pr-10 py-2 text-base rounded-lg border-gray-300 focus:outline-none focus:ring-[#00D5BE] focus:border-[#00D5BE] sm:text-sm transition-all duration-200 appearance-none bg-white">
                                            <option value="">Pilih Provinsi</option>
                                            @foreach($provinces as $province)
                                                <option value="{{ $province->id }}">{{ $province->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div id="provinceLoading" class="hidden absolute inset-y-0 right-0 flex items-center pr-8">
                                            <svg class="animate-spin h-5 w-5 text-[#00D5BE]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <p id="provinceError" class="hidden mt-2 text-sm text-red-600"></p>
                                </div>
                                
                                <div id="cityContainer" class="hidden">
                                    <x-input-label value="Kota/Kabupaten" required />
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                            </svg>
                                        </div>
                                        <select name="city_id" id="city" 
                                            class="mt-1 block w-full pl-10 pr-10 py-2 text-base rounded-lg border-gray-300 focus:outline-none focus:ring-[#00D5BE] focus:border-[#00D5BE] sm:text-sm transition-all duration-200 appearance-none bg-white">
                                            <option value="">Pilih Kota/Kabupaten</option>
                                            @foreach($cities as $city)
                                                <option value="{{ $city->id }}" data-province="{{ $city->province_id }}" class="city-option">
                                                    {{ $city->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 shadow-sm">
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Data Tempat Penginapan</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <x-input-label value="Tempat menginap selama di Padang" required />
                                    <div class="relative mt-1">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                            </svg>
                                        </div>
                                        <input type="text" name="homestay" id="homestay" placeholder="Contoh: Hotel XYZ"
                                            class="block w-full pl-10 rounded-lg border-gray-300 shadow-sm focus:ring-[#00D5BE] focus:border-[#00D5BE]">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 shadow-sm">
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Data Tujuan Kunjungan</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <x-input-label value="Tanggal Kunjungan" required />
                                        <div class="relative mt-1">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                            <input type="date" name="day" id="day" min="{{ date('Y-m-d') }}"
                                                class="block w-full pl-10 rounded-lg border-gray-300 shadow-sm focus:ring-[#00D5BE] focus:border-[#00D5BE]">
                                        </div>
                                    </div>
                                
                                    <div>
                                        <x-input-label value="Jam Kunjungan (WIB)" required />
                                        <div class="relative mt-1">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                            <input type="time" name="clock" id="clock" min="07:00"
                                                class="block w-full pl-10 rounded-lg border-gray-300 shadow-sm focus:ring-[#00D5BE] focus:border-[#00D5BE]">
                                        </div>
                                    </div>
                                </div>
                        
                                <div>
                                    <x-input-label value="Topik Diskusi" required />
                                    <div class="relative mt-1">
                                        <div class="absolute top-3 left-3 flex items-start pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                            </svg>
                                        </div>
                                        <textarea name="topic" id="topic" rows="3" 
                                            class="block w-full pl-10 p-2 rounded-lg border-gray-300 shadow-sm focus:ring-[#00D5BE] focus:border-[#00D5BE]"></textarea>
                                    </div>
                                </div>
                                
                                <div>
                                    <x-input-label value="Jumlah Rombongan" required />
                                    <div class="relative mt-1">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </div>
                                        <input type="text" inputmode="numeric" name="group_size" id="group_size" min="1" 
                                            class="block w-full pl-10 rounded-lg border-gray-300 shadow-sm focus:ring-[#00D5BE] focus:border-[#00D5BE]">
                                    </div>
                                </div>
                                
                                <div>
                                    <x-input-label value="Jabatan Pimpinan Rombongan" required />
                                    <div class="relative mt-1">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <input type="text" name="group_leader" id="group_leader" 
                                            class="block w-full pl-10 rounded-lg border-gray-300 shadow-sm focus:ring-[#00D5BE] focus:border-[#00D5BE]">
                                    </div>
                                </div>
                        
                                <div class="md:col-span-2">
                                    <x-input-label value="Keterangan" />
                                    <div class="relative mt-1">
                                        <div class="absolute top-3 left-3 flex items-start pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </div>
                                        <textarea name="description" id="description" rows="3"
                                            class="block w-full pl-10 p-2 rounded-lg border-gray-300 shadow-sm focus:ring-[#00D5BE] focus:border-[#00D5BE]"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-yellow-50 p-6 rounded-xl border border-yellow-200 shadow-sm">
                            <h3 class="text-xl font-semibold text-yellow-800 mb-4">Data Surat Permohonan Kunjungan</h3>
                        
                            <div>
                                <x-input-label value="Upload Surat (JPG/JPEG/PNG/PDF, max 3MB)" />
                                <div class="relative mt-1">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                        </svg>
                                    </div>
                                    <input type="file" name="letter_file" id="letter_file" accept=".jpg,.jpeg,.png,.pdf"
                                        class="block w-full pl-10 text-sm text-gray-500 
                                        file:mr-4 file:py-2 file:px-4 
                                        file:rounded-lg file:border-0 
                                        file:text-sm file:font-semibold 
                                        file:bg-yellow-100 file:text-yellow-800 
                                        hover:file:bg-yellow-200 transition-colors">
                                </div>
                            </div>
                        </div>                      
                        
                        <p class="mt-4 text-sm text-red-500">
                            * Dengan mengirimkan formulir ini, Anda dianggap telah membaca seluruh tata cara penerimaan tamu di Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kota Padang dan bersedia mematuhi seluruh ketentuan dan peraturan yang berlaku.
                        </p>

                        <button type="submit" class="w-full bg-[#00D5BE] text-white py-3 rounded-lg mt-6">
                            Kirim Permohonan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const provinceSelect = document.getElementById('province');
        const citySelect = document.getElementById('city');
        const cityContainer = document.getElementById('cityContainer');
        const cityOptions = document.querySelectorAll('.city-option');
        
        cityOptions.forEach(option => {
            option.style.display = 'none';
        });
        
        provinceSelect.addEventListener('change', function() {
            const selectedProvinceId = this.value;
            
            citySelect.value = '';
            
            if (selectedProvinceId) {
                cityContainer.classList.remove('hidden');
                
                cityOptions.forEach(option => {
                    if (option.dataset.province === selectedProvinceId) {
                        option.style.display = '';
                    } else {
                        option.style.display = 'none';
                    }
                });
            } else {
                cityContainer.classList.add('hidden');
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const letterFile = document.getElementById('letter_file');
        const maxSize = 3 * 1024 * 1024; 
        
        const allowedTypes = [
            'image/jpeg',
            'image/jpg',
            'image/png',
            'application/pdf'
        ];
        
        const allowedExtensions = ['.jpg', '.jpeg', '.png', '.pdf'];

        function showFileError(message) {
            clearFileError();

            const errorDiv = document.createElement('div');
            errorDiv.className = 'mt-2 text-sm text-red-600';
            errorDiv.textContent = message;
            letterFile.parentElement.appendChild(errorDiv);

            letterFile.value = '';
        }

        function clearFileError() {
            const existingError = letterFile.parentElement.querySelector('.text-red-600');
            if (existingError) {
                existingError.remove();
            }
        }

        letterFile.addEventListener('change', function(e) {
            clearFileError();

            const file = e.target.files[0];
            if (!file) return;

            if (file.size > maxSize) {
                showFileError('Ukuran file tidak boleh lebih dari 3MB');
                return;
            }

            const fileName = file.name.toLowerCase();
            const hasValidExtension = allowedExtensions.some(ext => 
                fileName.endsWith(ext.toLowerCase())
            );
            
            if (!hasValidExtension) {
                showFileError('File harus berformat JPG, JPEG, PNG, atau PDF');
                return;
            }

            if (!allowedTypes.includes(file.type.toLowerCase())) {
                showFileError('Format file tidak valid. Gunakan JPG, JPEG, PNG, atau PDF');
                return;
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('reservationForm');

        form.addEventListener('submit', async function(event) {
            event.preventDefault();

            const formData = new FormData(form);

            try {
                const response = await fetch('{{ route('visits.store') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    },
                    body: formData
                });

                const result = await response.json();

                if (result.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: result.message,
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#00D5BE'
                    }).then(() => {
                        window.location.href = result.redirect;
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: result.message,
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#00D5BE'
                    });
                }
            } catch (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Terjadi kesalahan. Silakan coba lagi.',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#00D5BE'
                });
            }
        });
    });
</script>