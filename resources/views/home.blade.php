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
            <a href="{{ route('hotel') }}" class="group bg-white rounded-2xl shadow-xl p-8 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl cursor-pointer">
                <div class="flex items-center mb-6">
                    <div class="p-4 bg-teal-100 rounded-xl group-hover:bg-[#00D5BE] group-hover:text-white transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#00D5BE] group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </div>
                    <h3 class="ml-4 text-xl font-bold text-gray-800">Referensi Kunjungan</h3>
                </div>
                <p class="text-gray-600 group-hover:text-gray-700">Temukan rekomendasi hotel, oleh-oleh khas, dan tempat menarik di Kota Padang untuk membuat kunjungan Anda lebih berkesan</p>
            </a>
    
            <a href="{{ route('reservation') }}" class="group bg-white rounded-2xl shadow-xl p-8 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl cursor-pointer">
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
        </div>
    </div>

    <div class="container mx-auto px-4 lg:px-24 py-16">
        <div class="bg-white rounded-2xl shadow-xl p-8 mb-12 max-w-3xl mx-auto transform transition-all hover:shadow-2xl">
            <h2 class="text-2xl font-bold text-gray-800 text-center mb-8">Statistik Kunjungan</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="text-center">
                    <div class="text-4xl font-bold text-[#00D5BE] mb-2">{{ number_format($totalVisits) }}</div>
                    <p class="text-gray-600">Total Kunjungan</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-[#00D5BE] mb-2">{{ number_format($visitsThisMonth) }}</div>
                    <p class="text-gray-600">Kunjungan Bulan Ini</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-[#00D5BE] mb-2">{{ number_format($visitsToday) }}</div>
                    <p class="text-gray-600">Kunjungan Hari Ini</p>
                </div>
            </div>
        </div>
        
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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const kotaChart = new Chart(document.getElementById('kotaChart'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($topCities->pluck('city')) !!},
                datasets: [{
                    label: 'Jumlah Kunjungan',
                    data: {!! json_encode($topCities->pluck('total')) !!},
                    backgroundColor: '#00D5BE',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });

        const provinsiChart = new Chart(document.getElementById('provinsiChart'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($topProvinces->pluck('province')) !!},
                datasets: [{
                    label: 'Jumlah Kunjungan',
                    data: {!! json_encode($topProvinces->pluck('total')) !!},
                    backgroundColor: '#00D5BE',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    });
</script>
@endsection