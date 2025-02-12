@extends('layouts.main')
@section('title', 'Referensi Oleh-Oleh | DPMPTSP Kota Padang')
@section('content')
<div class="container mx-auto px-8 py-8 pt-24">
    <div class="mb-8 text-center">
        <h1 class="text-4xl font-bold text-gray-900 mb-3">Referensi Oleh-Oleh di Padang</h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">Temukan buah tangan terbaik untuk dibawa pulang dari Kota Padang</p>
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
                placeholder="Cari oleh-oleh...">
        </div>
        <select id="category" name="category" 
            class="w-full sm:w-48 px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-transparent bg-white transition-all duration-300">
            <option value="">Semua Kategori</option>
            <option value="makanan">Makanan</option>
            <option value="minuman">Minuman</option>
            <option value="kerajinan">Kerajinan</option>
            <option value="fashion">Fashion</option>
        </select>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="souvenirGrid">
    </div>

    <div class="mt-12 flex justify-center" id="pagination">
        <nav class="flex items-center gap-3 bg-white px-4 py-2 rounded-xl shadow-sm">
        </nav>
    </div>
</div>

<template id="souvenirCardTemplate">
    <div class="bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-500 transform hover:-translate-y-1">
        <div class="p-8">
            <div class="flex justify-between items-start mb-4">
                <h3 class="text-xl font-bold text-gray-900 mb-2"></h3>
                <div class="price px-3 py-1 rounded-full text-sm font-medium bg-gradient-to-r from-teal-500 to-teal-600 text-white shadow-sm hidden">
                </div>
            </div>
            <div class="space-y-4">
                <div class="flex gap-3 text-gray-600">
                    <div class="p-2 bg-teal-50 rounded-lg shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <p class="text-sm description leading-relaxed line-clamp-3"></p>
                </div>
                <div class="flex items-center gap-3 text-gray-600">
                    <div class="p-2 bg-teal-50 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/>
                        </svg>
                    </div>
                    <p class="text-sm variants hidden"></p>
                </div>
                <div class="border-t border-gray-100 pt-4 mt-4">
                    <div class="flex items-center gap-3 text-gray-600">
                        <div class="p-2 bg-teal-50 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                        </div>
                        <p class="text-sm source"></p>
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
    let currentPage = 1;
    const itemsPerPage = 9;
    let souvenirData = @json($souvenirs)['oleh-oleh']; 

    console.log('Initial souvenir data:', souvenirData);
    initializeSouvenirs();

    function renderSouvenirs(souvenirs) {
        const grid = document.getElementById('souvenirGrid');
        const template = document.getElementById('souvenirCardTemplate');
        
        grid.innerHTML = '';
        
        const startIndex = (currentPage - 1) * itemsPerPage;
        const paginatedSouvenirs = souvenirs.slice(startIndex, startIndex + itemsPerPage);
        
        paginatedSouvenirs.forEach(souvenir => {
            const card = template.content.cloneNode(true);
            
            card.querySelector('h3').textContent = souvenir.nama;
            card.querySelector('.description').textContent = souvenir.deskripsi;
            card.querySelector('.source').textContent = `Sumber: ${souvenir.sumber}`;
            
            if (souvenir.harga) {
                const priceEl = card.querySelector('.price');
                priceEl.textContent = `${souvenir.harga.min}${souvenir.harga.max ? ' - ' + souvenir.harga.max : ''}`;
                priceEl.classList.remove('hidden');
            }
            
            if (souvenir.varian && souvenir.varian.length > 0) {
                const variantsEl = card.querySelector('.variants');
                variantsEl.textContent = `Varian: ${souvenir.varian.join(', ')}`;
                variantsEl.classList.remove('hidden');
            }
            
            grid.appendChild(card);
        });

        renderPagination(souvenirs.length);
    }

    function renderPagination(totalItems) {
        const totalPages = Math.ceil(totalItems / itemsPerPage);
        const pagination = document.getElementById('pagination').querySelector('nav');
        
        pagination.innerHTML = `
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
    }

    document.getElementById('search').addEventListener('input', _.debounce((e) => {
        const searchTerm = e.target.value.toLowerCase();
        const filteredSouvenirs = souvenirData.filter(souvenir => 
            souvenir.nama.toLowerCase().includes(searchTerm) ||
            souvenir.deskripsi.toLowerCase().includes(searchTerm)
        );
        currentPage = 1;
        renderSouvenirs(filteredSouvenirs);
    }, 300));

    document.getElementById('category').addEventListener('change', (e) => {
        const category = e.target.value.toLowerCase();
        let filteredSouvenirs = souvenirData;
        
        if (category) {
            filteredSouvenirs = souvenirData.filter(souvenir => {
                const itemName = souvenir.nama.toLowerCase();
                
                switch(category) {
                    case 'makanan':
                        const makananKeywords = ['rendang', 'keripik', 'kipang', 'sanjai', 'dadiah', 
                            'rakik', 'karak', 'kerupuk'];
                        return makananKeywords.some(keyword => itemName.includes(keyword));
                        
                    case 'minuman':
                        const minumanKeywords = ['kopi', 'teh', 'sirup'];
                        return minumanKeywords.some(keyword => itemName.includes(keyword));
                        
                    case 'kerajinan':
                        const kerajinanKeywords = ['songket', 'sulam', 'ukir', 'anyam', 'tenun'];
                        return kerajinanKeywords.some(keyword => itemName.includes(keyword));
                        
                    case 'fashion':
                        const fashionKeywords = ['kaos', 'mukena', 'baju', 'pakaian', 'kain'];
                        return fashionKeywords.some(keyword => itemName.includes(keyword));
                        
                    default:
                        return false;
                }
            });
        }
        
        currentPage = 1;
        renderSouvenirs(filteredSouvenirs);
    });

    window.changePage = function(page) {
        currentPage = page;
        renderSouvenirs(souvenirData);
    }

    function initializeSouvenirs() {
        renderSouvenirs(souvenirData);
    }
});
</script>
@endsection