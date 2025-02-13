<footer class="bg-gradient-to-b from-white to-gray-50 border-t border-teal-100">
    <div class="mx-auto w-full max-w-screen-xl p-6 lg:p-8">
        <div class="flex flex-col md:flex-row justify-between gap-8">
            <div class="flex gap-6 max-w-xl">
                <a href="{{ route('home') }}" class="inline-block group flex-shrink-0">
                    <div class="flex items-center hover:opacity-90 transition-opacity">
                        <img src="{{ asset('images/Logo_Padang.svg') }}" class="h-16 object-contain transform group-hover:scale-105 transition-transform duration-300" alt="Logo DPMPTSP" />
                    </div>
                </a>
                <div>
                    <p class="text-gray-600 leading-relaxed font-bold">
                        Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kota Padang Sumatera Barat
                    </p>
                    <div class="mt-4">
                        <a href="https://maps.app.goo.gl/YyQdGocwwccfSqQX9" target="_blank"
                           class="flex items-center gap-3 text-gray-600 hover:text-[#00D5BE] transition-colors group">
                            <span class="bg-teal-50 p-2 rounded-lg group-hover:bg-teal-100 transition-colors">
                                <i class="fas fa-location-dot text-[#00D5BE]"></i>
                            </span>
                            <span>Jalan Jenderal Sudirman No. 1, Padang</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="md:text-left">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Kontak</h3>
                <div class="space-y-3">
                    <a href="mailto:dpmptsp@padang.go.id" class="flex items-center gap-3 text-gray-600 hover:text-[#00D5BE] transition-colors group">
                        <span class="bg-teal-50 p-2 rounded-lg group-hover:bg-teal-100 transition-colors">
                            <i class="fas fa-envelope text-[#00D5BE]"></i>
                        </span>
                        <span>dpmptsp@padang.go.id</span>
                    </a>
                    <a href="https://wa.me/6281374078088" target="_blank" class="flex items-center gap-3 text-gray-600 hover:text-[#00D5BE] transition-colors group">
                        <span class="bg-teal-50 p-2 rounded-lg group-hover:bg-teal-100 transition-colors">
                            <i class="fab fa-whatsapp text-[#00D5BE]"></i>
                        </span>
                        <span>+62 813-7407-8088</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="mt-12 pt-8 border-t border-gray-200">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-gray-600 text-center md:text-left">
                    © {{ date('Y') }} <span class="font-medium">DPMPTSP Kota Padang</span>. All Rights Reserved.
                </p>
                <div class="flex items-center gap-4">
                    <a href="https://instagram.com/dpmptsppadang" target="_blank"
                       class="bg-gradient-to-br from-pink-500 to-rose-500 p-2 rounded-lg text-white hover:opacity-90 transform hover:scale-105 transition-all">
                        <i class="fab fa-instagram text-lg"></i>
                    </a>
                    <a href="https://www.youtube.com/@dpmptspkotapadang8461" target="_blank"
                       class="bg-gradient-to-br from-red-500 to-red-600 p-2 rounded-lg text-white hover:opacity-90 transform hover:scale-105 transition-all">
                        <i class="fab fa-youtube text-lg"></i>
                    </a>
                    <a href="https://www.tiktok.com/@dpmptsppadang" target="_blank"
                       class="bg-gradient-to-br from-gray-800 to-black p-2 rounded-lg text-white hover:opacity-90 transform hover:scale-105 transition-all">
                        <i class="fab fa-tiktok text-lg"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>