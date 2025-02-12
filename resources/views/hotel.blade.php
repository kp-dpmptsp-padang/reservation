@extends('layouts.main')
@section('title', 'Referensi Penginapan | DPMPTSP Kota Padang')
@section('content')
<div class="container mx-auto px-8 py-8 pt-24">
    <div class="mb-8 text-center">
        <h1 class="text-4xl font-bold text-gray-900 mb-3">Referensi Penginapan di Padang</h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">Temukan akomodasi terbaik untuk mendukung kunjungan Anda ke Kota Padang</p>
        <p class="mt-4 text-sm text-gray-500">
            Sumber: 
            <a href="https://bkd.sumbarprov.go.id/images/2022/08/file/DATA_HOTEL_PADANG_-_2022_VALID_-_UPDATE_-_01_08_2022.pdf" 
               target="_blank"
               class="text-teal-600 hover:text-teal-700 underline underline-offset-2">
                Data Penginapan Padang 2022
            </a>
        </p>
    </div>

    <div class="mb-8 flex justify-center">
        <nav class="flex space-x-4 border-b border-gray-200 w-full max-w-3xl">
            <a href="{{ route('hotel') }}" 
               class="px-6 py-3 font-medium text-sm {{ request()->routeIs('hotel') ? 'text-teal-600 border-b-2 border-teal-600' : 'text-gray-500 hover:text-gray-700' }}">
                Penginapan
            </a>
            <a href="{{ route('souvenir') }}" 
               class="px-6 py-3 font-medium text-sm {{ request()->routeIs('souvenir') ? 'text-teal-600 border-b-2 border-teal-600' : 'text-gray-500 hover:text-gray-700' }}">
                Oleh-oleh
            </a>
        </nav>
    </div>
    
    <div class="mb-8 flex flex-col sm:flex-row justify-center gap-4 max-w-3xl mx-auto">
        <div class="relative flex-1">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
            <input type="text" id="search" name="search" 
                class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all duration-300"
                placeholder="Cari penginapan...">
        </div>
        <select id="star_rating" name="star_rating" 
            class="w-full sm:w-48 px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-transparent bg-white transition-all duration-300">
            <option value="">Semua Klasifikasi</option>
            <option value="4">Bintang 4</option>
            <option value="3">Bintang 3</option>
            <option value="2">Bintang 2</option>
            <option value="1">Bintang 1</option>
            <option value="0">Non Bintang</option>
        </select>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="hotelGrid">
    </div>

    <div class="mt-12 flex justify-center" id="pagination">
        <nav class="flex items-center gap-3 bg-white px-4 py-2 rounded-xl shadow-sm">
        </nav>
    </div>
</div>

<template id="hotelCardTemplate">
    <div class="bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-500 transform hover:-translate-y-1">
        <div class="p-12">
            <div class="flex justify-between items-start mb-4">
                <h3 class="text-xl font-bold text-gray-900 mb-2"></h3>
                <div class="hotel-classification px-3 py-1 rounded-full text-sm font-medium bg-gradient-to-r from-teal-500 to-teal-600 text-white shadow-sm">
                </div>
            </div>
            <div class="space-y-4">
                <div class="flex items-center gap-3 text-gray-600">
                    <div class="p-2 bg-teal-50 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <span class="text-sm rooms"></span>
                </div>
                <div class="flex items-center gap-3 text-gray-600">
                    <div class="p-2 bg-teal-50 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <p class="text-sm address leading-tight"></p>
                </div>
                <div class="border-t border-gray-100 pt-4 mt-4">
                    <div class="flex items-center gap-3 text-gray-600 mb-3">
                        <div class="p-2 bg-teal-50 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <p class="text-sm pic-name"></p>
                    </div>
                    <div class="flex items-center gap-3 text-gray-600">
                        <div class="p-2 bg-teal-50 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <p class="text-sm phone"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<template id="loadingTemplate">
    <div class="col-span-1 md:col-span-2 lg:col-span-3 flex justify-center items-center py-20">
        <div class="relative">
            <div class="w-16 h-16 border-4 border-teal-100 border-solid rounded-full animate-spin border-t-teal-500"></div>
            <div class="w-10 h-10 border-4 border-teal-100 border-solid rounded-full animate-spin border-t-teal-500 absolute left-1/2 top-1/2 -ml-5 -mt-5"></div>
            <span class="sr-only">Loading...</span>
        </div>
        <p class="ml-4 text-lg font-medium text-teal-600">Memuat data...</p>
    </div>
</template>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const API_URL = 'https://padang-hotel-api.vercel.app';
    let currentPage = 1;
    const itemsPerPage = 9; 
    let isLoading = false;

    initializeHotels();

    function getClassificationBadge(starRating) {
        if (starRating === 4) return 'Bintang ★★★★';
        if (starRating === 3) return 'Bintang ★★★';
        if (starRating === 2) return 'Bintang ★★';
        if (starRating === 1) return 'Bintang ★';
        return 'Non Bintang';
    }

    function renderHotels(hotels) {
        const grid = document.getElementById('hotelGrid');
        const template = document.getElementById('hotelCardTemplate');
        
        grid.innerHTML = '';
        
        const startIndex = (currentPage - 1) * itemsPerPage;
        const paginatedHotels = hotels.slice(startIndex, startIndex + itemsPerPage);
        
        paginatedHotels.forEach(hotel => {
            const card = template.content.cloneNode(true);
            
            card.querySelector('h3').textContent = hotel.name;
            card.querySelector('.hotel-classification').textContent = getClassificationBadge(hotel.star_rating);
            card.querySelector('.rooms').textContent = `${hotel.total_rooms} Kamar`;
            card.querySelector('.address').textContent = hotel.address;
            card.querySelector('.pic-name').textContent = hotel.contact.pic_name;
            card.querySelector('.phone').textContent = hotel.contact.phone;
            
            grid.appendChild(card);
        });
    }

    function renderPagination(totalItems) {
        const totalPages = Math.ceil(totalItems / itemsPerPage);
        const pagination = document.getElementById('pagination');
        
        let paginationHTML = `
            <button onclick="changePage(${currentPage - 1})" 
                class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-teal-600 disabled:opacity-50 disabled:cursor-not-allowed transition-colors duration-300" 
                ${currentPage === 1 ? 'disabled' : ''}>
                ← Previous
            </button>
            <span class="px-4 py-2 text-sm font-medium text-gray-900">
                ${currentPage} dari ${totalPages}
            </span>
            <button onclick="changePage(${currentPage + 1})" 
                class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-teal-600 disabled:opacity-50 disabled:cursor-not-allowed transition-colors duration-300" 
                ${currentPage === totalPages ? 'disabled' : ''}>
                Next →
            </button>
        `;
        
        pagination.innerHTML = paginationHTML;
    }

    function showLoading() {
        const grid = document.getElementById('hotelGrid');
        const template = document.getElementById('loadingTemplate');
        grid.innerHTML = '';
        grid.appendChild(template.content.cloneNode(true));
    }

    function hideLoading() {
        const grid = document.getElementById('hotelGrid');
        const loadingElement = grid.querySelector('.loading');
        if (loadingElement) {
            loadingElement.remove();
        }
    }

    async function fetchHotels() {
        try {
            showLoading();
            const response = await fetch(`${API_URL}/hotels`);
            const data = await response.json();
            return data;
        } catch (error) {
            return null;
        } finally {
            hideLoading();
        }
    }

    document.getElementById('search').addEventListener('input', _.debounce(async (e) => {
        const searchTerm = e.target.value.toLowerCase();
        showLoading();
        const data = await fetchHotels();
        if (data && data.hotels) {
            const filteredHotels = data.hotels.filter(hotel => 
                hotel.name.toLowerCase().includes(searchTerm) ||
                hotel.address.toLowerCase().includes(searchTerm)
            );
            currentPage = 1;
            renderHotels(filteredHotels);
            renderPagination(filteredHotels.length);
        }
    }, 300));

    document.getElementById('star_rating').addEventListener('change', async (e) => {
        const rating = parseInt(e.target.value);
        showLoading();
        const data = await fetchHotels();
        if (data && data.hotels) {
            const filteredHotels = e.target.value === '' 
                ? data.hotels 
                : data.hotels.filter(hotel => hotel.star_rating === rating);
            currentPage = 1;
            renderHotels(filteredHotels);
            renderPagination(filteredHotels.length);
        }
    });

    window.changePage = async function(page) {
        showLoading();
        const data = await fetchHotels();
        if (data && data.hotels) {
            currentPage = page;
            renderHotels(data.hotels);
            renderPagination(data.hotels.length);
        }
    }

    async function initializeHotels() {
        const data = await fetchHotels();
        if (data && data.hotels) {
            renderHotels(data.hotels);
            renderPagination(data.hotels.length);
        }
    }
});

</script>
@endsection