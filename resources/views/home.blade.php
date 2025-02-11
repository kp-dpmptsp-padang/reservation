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
                <x-button href="#" variant="secondary">
                    Kontak
                </x-button>
            </div>
        </div>
    </div>
</div>

<div class="pt-8">
    <div class="container mx-auto px-4 lg:px-32 relative -mt-16 md:-mt-32 z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="group bg-white rounded-2xl shadow-xl p-8 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl">
                <div class="flex items-center mb-6">
                    <div class="p-4 bg-teal-100 rounded-xl group-hover:bg-[#00D5BE] group-hover:text-white transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#00D5BE] group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="ml-4 text-xl font-bold text-gray-800">Efisiensi Waktu</h3>
                </div>
                <p class="text-gray-600 group-hover:text-gray-700">Proses penerimaan tamu yang cepat dan mudah, dengan sistem antrian yang terstruktur</p>
            </div>

            <div class="group bg-white rounded-2xl shadow-xl p-8 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl">
                <div class="flex items-center mb-6">
                    <div class="p-4 bg-teal-100 rounded-xl group-hover:bg-[#00D5BE] group-hover:text-white transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#00D5BE] group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="ml-4 text-xl font-bold text-gray-800">Data Terintegrasi</h3>
                </div>
                <p class="text-gray-600 group-hover:text-gray-700">Pencatatan kunjungan terintegrasi dengan sistem untuk memudahkan tracking dan pelaporan</p>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 lg:px-24 py-16">
        <div class="bg-white rounded-2xl shadow-xl p-8 mb-12 max-w-3xl mx-auto transform transition-all hover:shadow-2xl">
            <h2 class="text-2xl font-bold text-gray-800 text-center mb-8">Statistik Kunjungan</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="text-center">
                    <div class="text-4xl font-bold text-[#00D5BE] mb-2">2,459</div>
                    <p class="text-gray-600">Total Kunjungan</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-[#00D5BE] mb-2">127</div>
                    <p class="text-gray-600">Kunjungan Bulan Ini</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-[#00D5BE] mb-2">15</div>
                    <p class="text-gray-600">Kunjungan Hari Ini</p>
                </div>
            </div>
        </div>
        <div class="container mx-auto px-4 lg:px-24 pb-16">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white rounded-2xl shadow-xl p-8 transform transition-all hover:shadow-2xl">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Demografi Asal Kota</h3>
                    <div class="w-full h-[300px]">
                        <canvas id="kotaChart"></canvas>
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow-xl p-8 transform transition-all hover:shadow-2xl">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Demografi Asal Provinsi</h3>
                    <div class="w-full h-[300px]">
                        <canvas id="provinsiChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const kotaChart = new Chart(document.getElementById('kotaChart'), {
            type: 'bar',
            data: {
                labels: ['Padang', 'Pariaman', 'Bukittinggi', 'Payakumbuh', 'Padang Panjang'],
                datasets: [{
                    label: 'Jumlah Kunjungan',
                    data: [150, 90, 80, 70, 60],
                    backgroundColor: '#00D5BE',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });

        const provinsiChart = new Chart(document.getElementById('provinsiChart'), {
            type: 'bar',
            data: {
                labels: ['Sumatera Barat', 'Riau', 'Jambi', 'Sumatera Utara', 'Jakarta'],
                datasets: [{
                    label: 'Jumlah Kunjungan',
                    data: [300, 150, 100, 80, 70],
                    backgroundColor: '#00D5BE',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });
    });
</script>
@endsection