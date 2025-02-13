@extends('layouts.main')
@section('title', 'Penerimaan Tamu | DPMPTSP Kota Padang')
@section('content')

<div class="relative min-h-[600px] overflow-hidden">
    <div class="absolute inset-0 transform scale-105"
         x-data="{ scroll: 0 }"
         x-init="window.addEventListener('scroll', () => scroll = window.pageYOffset)"
         :style="`transform: translateY(${scroll * 0.5}px)`">
        <img src="{{ asset('/images/bg-hero.jpg') }}" alt="DPMPTSP Background"
             class="w-full h-full object-cover filter brightness-75">
        <div class="absolute inset-0 bg-gradient-to-b from-gray-900/70 via-teal-900/60 to-teal-800/80"></div>
    </div>
    <div class="relative min-h-[600px] flex items-center justify-center flex-col text-white px-4">
        <div class="animate-fadeIn text-center"> 
            <h1 class="text-4xl md:text-4xl font-bold mb-6 leading-tight">
                Selamat Datang di Website Penerimaan Tamu <br> <span class="text-[#00D5BE]">DPMPTSP Kota Padang</span>
            </h1>
            <p class="text-l mb-10 max-w-2xl text-gray-200 mx-auto"> 
                Jadwalkan kunjungan Anda dengan mudah dan efisien
            </p>
            <div class="flex justify-center gap-6">
                <x-button href="{{ route('reservation') }}" variant="primary">
                    Reservasi
                </x-button>
                <x-button href="https://wa.me/6281374078088?text=Halo, saya ingin bertanya terkait tata cara reservasi kunjungan ke DPMPTSP Kota Padang" 
                    target="_blank" variant="secondary">
                    Kontak
                </x-button>
            </div>
        </div>
    </div>
</div>

<div class="pt-8">
    <div class="container mx-auto px-4 lg:px-32 relative -mt-16 md:-mt-32 z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">    
            <a href="{{ route('reservation') }}" class="group bg-white rounded-2xl shadow-xl p-8 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl cursor-pointer h-48 flex flex-col justify-center">
                <div class="flex items-center mb-6">
                    <div class="p-4 bg-teal-100 rounded-xl group-hover:bg-[#00D5BE] group-hover:text-white transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#00D5BE] group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="ml-4 text-xl font-bold text-gray-800">Reservasi Kunjungan</h3>
                </div>
                <p class="text-gray-600 group-hover:text-gray-700">Jadwalkan kunjungan Anda ke DPMPTSP Kota Padang dengan mudah dan cepat melalui sistem reservasi online kami</p>
            </a>

            <a href="https://dpmptsp.padang.go.id/" target="_blank" class="group bg-white rounded-2xl shadow-xl p-8 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl cursor-pointer h-48 flex flex-col justify-center">
                <div class="flex items-center mb-6">
                    <div class="p-4 bg-teal-100 rounded-xl group-hover:bg-[#00D5BE] group-hover:text-white transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#00D5BE] group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </div>
                    <h3 class="ml-4 text-xl font-bold text-gray-800">Profil Dinas</h3>
                </div>
                <p class="text-gray-600 group-hover:text-gray-700">Lihat informasi lengkap tentang DPMPTSP Kota Padang melalui website resmi.</p>
            </a>
        </div>
    </div>

    <div class="container mx-auto px-4 lg:px-24 py-16">
        <div class="bg-gradient-to-br from-white to-teal-50 rounded-2xl shadow-xl p-8 mb-12 max-w-4xl mx-auto transform transition-all hover:shadow-2xl">
            <div class="flex items-center justify-center mb-8">
                <div class="bg-teal-100 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#00D5BE]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800 ml-4">Panduan Tata Cara Kunjungan</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-6">
                    <div class="flex items-start space-x-4 bg-white p-4 rounded-xl shadow-sm hover:shadow-md transition-all">
                        <div class="flex-shrink-0 bg-[#00D5BE] text-white rounded-full w-8 h-8 flex items-center justify-center font-bold">
                            1
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800">Hubungi WhatsApp Admin</h3>
                            <p class="text-gray-600 mt-1">Pengunjung dapat menghubungi Kepala Dinas jika diperlukan</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4 bg-white p-4 rounded-xl shadow-sm hover:shadow-md transition-all">
                        <div class="flex-shrink-0 bg-[#00D5BE] text-white rounded-full w-8 h-8 flex items-center justify-center font-bold">
                            2
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800">Isi Form Kunjungan</h3>
                            <p class="text-gray-600 mt-1">Pengunjung mengisi form dan mendapatkan nomor WhatsApp</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4 bg-white p-4 rounded-xl shadow-sm hover:shadow-md transition-all">
                        <div class="flex-shrink-0 bg-[#00D5BE] text-white rounded-full w-8 h-8 flex items-center justify-center font-bold">
                            3
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800">Komunikasi dengan Admin</h3>
                            <p class="text-gray-600 mt-1">Pengunjung berkomunikasi dengan admin terkait rencana kunjungan</p>
                        </div>
                    </div>
                </div>
                
                <div class="space-y-6">
                    <div class="flex items-start space-x-4 bg-white p-4 rounded-xl shadow-sm hover:shadow-md transition-all">
                        <div class="flex-shrink-0 bg-[#00D5BE] text-white rounded-full w-8 h-8 flex items-center justify-center font-bold">
                            4
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800">Verifikasi Kunjungan</h3>
                            <p class="text-gray-600 mt-1">Admin memverifikasi kunjungan dan menyepakati waktu pelaksanaan</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4 bg-white p-4 rounded-xl shadow-sm hover:shadow-md transition-all">
                        <div class="flex-shrink-0 bg-[#00D5BE] text-white rounded-full w-8 h-8 flex items-center justify-center font-bold">
                            5
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800">Pelaksanaan Kunjungan</h3>
                            <p class="text-gray-600 mt-1">Pengunjung datang sesuai waktu yang telah disepakati</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4 bg-white p-4 rounded-xl shadow-sm hover:shadow-md transition-all">
                        <div class="flex-shrink-0 bg-[#00D5BE] text-white rounded-full w-8 h-8 flex items-center justify-center font-bold">
                            6
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800">Selesai</h3>
                            <p class="text-gray-600 mt-1">Kunjungan selesai</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="bg-gradient-to-r from-teal-800 to-teal-600 p-6">
                    <div class="flex items-center space-x-4">
                        <div class="bg-white/10 p-3 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white">Lokasi DPMPTSP Kota Padang</h3>
                            <p class="text-teal-100 mt-1">Jalan Jenderal Sudirman No. 1, Kota Padang</p>
                        </div>
                    </div>
                </div>
                <div class="p-1">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d814.766731896232!2d100.3623510478487!3d-0.947836443095347!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b9478dac36d3%3A0xc2d9755a20e8b0e1!2sDPMPTSP%20Kota%20Padang!5e0!3m2!1sen!2sid!4v1739372796007!5m2!1sen!2sid"
                        width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" class="rounded-lg"></iframe>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="bg-gradient-to-r from-teal-800 to-teal-600 p-6">
                    <div class="flex items-center space-x-4">
                        <div class="bg-white/10 p-3 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white">Lokasi MPP Kota Padang</h3>
                            <p class="text-teal-100 mt-1">Plaza Andalas Lantai 4, Kota Padang</p>
                        </div>
                    </div>
                </div>
                <div class="p-1">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d997.3172006553166!2d100.35512156953536!3d-0.9509482999399828!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b90043bdd301%3A0x803bacc0cfedee63!2sMal%20Pelayanan%20Publik%20Kota%20Padang!5e0!3m2!1sen!2sid!4v1739444404510!5m2!1sen!2sid"
                        width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" class="rounded-lg"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection