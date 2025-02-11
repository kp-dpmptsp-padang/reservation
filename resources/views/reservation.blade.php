@extends('layouts.main')
@section('title', 'Reservasi | DPMPTSP Kota Padang')
@section('content')

    <div class="relative bg-gradient-to-r from-[#00D5BE] to-[#00A499] pb-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-24 pb-8">
            <h1 class="text-4xl font-extrabold text-white tracking-tight">
                Registrasi Kunjungan
            </h1>
            <p class="mt-4 max-w-2xl text-xl text-teal-100">
                Silakan lengkapi formulir di bawah ini untuk melakukan reservasi kunjungan.
            </p>
        </div>
    </div>

    <div class="relative -mt-32 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="p-8">
                    <form action="" method="POST" enctype="multipart/form-data" class="space-y-8">
                        @csrf

                        <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 shadow-sm">
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Data Pemohon</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                    <div class="relative mt-1">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <input type="text" name="name" id="name" required 
                                            class="block w-full pl-10 rounded-lg border-gray-300 shadow-sm focus:ring-[#00D5BE] focus:border-[#00D5BE]">
                                    </div>
                                </div>

                                <div>
                                    <label for="institution" class="block text-sm font-medium text-gray-700">Nama Instansi Pemohon</label>
                                    <div class="relative mt-1">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                            </svg>
                                        </div>
                                        <input type="text" name="institution" id="institution" required 
                                            class="block w-full pl-10 rounded-lg border-gray-300 shadow-sm focus:ring-[#00D5BE] focus:border-[#00D5BE]">
                                    </div>
                                </div>

                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700">Nomor HP (dapat menerima panggilan)</label>
                                    <div class="relative mt-1">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                        </div>
                                        <input type="tel" name="phone" id="phone" required 
                                            class="block w-full pl-10 rounded-lg border-gray-300 shadow-sm focus:ring-[#00D5BE] focus:border-[#00D5BE]">
                                    </div>
                                </div>

                                <div>
                                    <label for="whatsapp" class="block text-sm font-medium text-gray-700">WA (boleh sama dengan nomor HP)</label>
                                    <div class="relative mt-1">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                            </svg>
                                        </div>
                                        <input type="tel" name="whatsapp" id="whatsapp" required 
                                            class="block w-full pl-10 rounded-lg border-gray-300 shadow-sm focus:ring-[#00D5BE] focus:border-[#00D5BE]">
                                    </div>
                                </div>

                                <div>
                                    <label for="province" class="block text-sm font-medium text-gray-700">Provinsi</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                                <circle cx="12" cy="10" r="3"></circle>
                                            </svg>
                                        </div>
                                        <select name="province" id="province" required 
                                            class="mt-1 block w-full pl-10 pr-10 py-2 text-base rounded-lg border-gray-300 focus:outline-none focus:ring-[#00D5BE] focus:border-[#00D5BE] sm:text-sm transition-all duration-200 appearance-none bg-white">
                                            <option value="">Pilih Provinsi</option>
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

                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email Instansi/Lembaga/Pemohon</label>
                                    <div class="relative mt-1">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <input type="email" name="email" id="email" required 
                                            class="block w-full pl-10 rounded-lg border-gray-300 shadow-sm focus:ring-[#00D5BE] focus:border-[#00D5BE]">
                                    </div>
                                </div>
                            
                                <div id="cityContainer" class="hidden">
                                    <label for="city" class="block text-sm font-medium text-gray-700">Kota/Kabupaten</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                            </svg>
                                        </div>
                                        <select name="city" id="city" required 
                                            class="mt-1 block w-full pl-10 pr-10 py-2 text-base rounded-lg border-gray-300 focus:outline-none focus:ring-[#00D5BE] focus:border-[#00D5BE] sm:text-sm transition-all duration-200 appearance-none bg-white">
                                            <option value="">Pilih Kota/Kabupaten</option>
                                        </select>
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div id="cityLoading" class="hidden absolute inset-y-0 right-0 flex items-center pr-8">
                                            <svg class="animate-spin h-5 w-5 text-[#00D5BE]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <p id="cityError" class="hidden mt-2 text-sm text-red-600"></p>
                                </div>

                                <div class="md:col-span-2">
                                    <label for="address" class="block text-sm font-medium text-gray-700">Alamat Instansi</label>
                                    <div class="relative mt-1">
                                        <div class="absolute top-3 left-3 flex items-start pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </div>
                                        <textarea name="address" id="address" rows="3" required 
                                            class="block w-full pl-10 p-2 rounded-lg border-gray-300 shadow-sm focus:ring-[#00D5BE] focus:border-[#00D5BE]"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 shadow-sm">
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Data Tujuan Reservasi</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="visit_date" class="block text-sm font-medium text-gray-700">Hari & Pukul Kunjungan</label>
                                    <input type="datetime-local" name="visit_date" id="visit_date" required 
                                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-[#00D5BE] focus:border-[#00D5BE]">
                                </div>

                                <div>
                                    <label for="topic" class="block text-sm font-medium text-gray-700">Topik Diskusi</label>
                                    <div class="relative mt-1">
                                        <div class="absolute top-3 left-3 flex items-start pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                            </svg>
                                        </div>
                                        <textarea name="topic" id="topic" rows="3" required 
                                            class="block w-full pl-10 p-2 rounded-lg border-gray-300 shadow-sm focus:ring-[#00D5BE] focus:border-[#00D5BE]"></textarea>
                                    </div>
                                </div>
                                
                                <div>
                                    <label for="total_visitors" class="block text-sm font-medium text-gray-700">Jumlah Rombongan</label>
                                    <div class="relative mt-1">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </div>
                                        <input type="text" inputmode="numeric" name="total_visitors" id="total_visitors" required min="1" 
                                            class="block w-full pl-10 rounded-lg border-gray-300 shadow-sm focus:ring-[#00D5BE] focus:border-[#00D5BE]">
                                    </div>
                                </div>
                                
                                <div>
                                    <label for="group_leader" class="block text-sm font-medium text-gray-700">Pimpinan Rombongan</label>
                                    <div class="relative mt-1">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <input type="text" name="group_leader" id="group_leader" required 
                                            class="block w-full pl-10 rounded-lg border-gray-300 shadow-sm focus:ring-[#00D5BE] focus:border-[#00D5BE]">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-yellow-50 p-6 rounded-xl border border-yellow-200 shadow-sm">
                            <h3 class="text-xl font-semibold text-yellow-800 mb-4">Data Surat Permohonan Kunjungan (Opsional)</h3>
                        
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="letter_number" class="block text-sm font-medium text-gray-700">No. Surat Permohonan Kunjungan</label>
                                    <div class="relative mt-1">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </div>
                                        <input type="text" name="letter_number" id="letter_number"
                                            class="block w-full pl-10 rounded-lg border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500 transition-colors">
                                    </div>
                                 </div>
                                 
                                 <div>
                                    <label for="letter_file" class="block text-sm font-medium text-gray-700">Upload Surat (JPG/JPEG/PNG/PDF, max 3MB)</label>
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
                        
                        </div>                       
                        
                        <p class="mt-4 text-sm text-red-500">
                            * Dengan mengirimkan formulir ini, Anda dianggap telah membaca seluruh tata cara penerimaan tamu di Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kota Padang dan bersedia mematuhi seluruh ketentuan tersebut.
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
        const provinceLoading = document.getElementById('provinceLoading');
        const cityLoading = document.getElementById('cityLoading');
        const provinceError = document.getElementById('provinceError');
        const cityError = document.getElementById('cityError');
    
        const API_BASE_URL = 'https://indonesia-regions-api.vercel.app/';
    
        function showError(element, message) {
            element.textContent = message;
            element.classList.remove('hidden');
        }
    
        function hideError(element) {
            element.textContent = '';
            element.classList.add('hidden');
        }
    
        async function fetchProvinces() {
            try {
                provinceLoading.classList.remove('hidden');
                hideError(provinceError);
    
                const response = await fetch(`${API_BASE_URL}provinces`);
                if (!response.ok) throw new Error('Gagal mengambil data provinsi');
                
                const data = await response.json();
                
                data.sort((a, b) => a.name.localeCompare(b.name));
                
                provinceSelect.innerHTML = '<option value="">Pilih Provinsi</option>';
                data.forEach(province => {
                    const option = document.createElement('option');
                    option.value = province.id;
                    option.textContent = province.name;
                    provinceSelect.appendChild(option);
                });
            } catch (error) {
                console.error('Error:', error);
                showError(provinceError, 'Gagal memuat data provinsi. Silakan coba lagi.');
            } finally {
                provinceLoading.classList.add('hidden');
            }
        }
    
        async function fetchCities(provinceId) {
            try {
                cityLoading.classList.remove('hidden');
                hideError(cityError);
                
                const response = await fetch(`${API_BASE_URL}provinces/${provinceId}`);
                if (!response.ok) throw new Error('Gagal mengambil data kota');
                
                const data = await response.json();
                
                const cities = Array.isArray(data) ? data : data.cities || [];
                
                if (cities.length > 0) {
                    cities.sort((a, b) => a.name.localeCompare(b.name));
                }
                
                citySelect.innerHTML = '<option value="">Pilih Kota/Kabupaten</option>';
                cities.forEach(city => {
                    const option = document.createElement('option');
                    option.value = city.id;
                    option.textContent = city.name;
                    citySelect.appendChild(option);
                });

                cityContainer.classList.remove('hidden');
            } catch (error) {
                console.error('Error:', error);
                showError(cityError, 'Gagal memuat data kota. Silakan coba lagi.');
            } finally {
                cityLoading.classList.add('hidden');
            }
        }
    
        provinceSelect.addEventListener('change', function() {
            hideError(cityError);
            if (this.value) {
                fetchCities(this.value);
            } else {
                cityContainer.classList.add('hidden');
                citySelect.innerHTML = '<option value="">Pilih Kota/Kabupaten</option>';
            }
        });
    
        fetchProvinces();
    });
    </script>