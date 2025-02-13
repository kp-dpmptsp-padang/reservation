<footer class="bg-gradient-to-b from-white to-teal-50/30 border-t border-teal-100">
    <div class="mx-auto w-full max-w-screen-xl p-6 lg:p-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="flex flex-col space-y-4">
                <a href="{{ route('home') }}" class="inline-block group">
                    <div class="flex items-center hover:opacity-90 transition-opacity">
                        <img src="{{ asset('images/Logo_Padang.svg') }}" class="h-16 object-contain transform group-hover:scale-105 transition-transform duration-300" alt="Logo DPMPTSP" />
                    </div>
                </a>
                <div>
                    <p class="text-gray-700 font-bold leading-relaxed">
                        Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kota Padang
                    </p>
                    <a href="https://maps.app.goo.gl/YyQdGocwwccfSqQX9" target="_blank"
                       class="mt-4 flex items-center gap-3 text-gray-600 hover:text-[#00D5BE] transition-colors group">
                        <span class="bg-teal-50 p-2 rounded-lg group-hover:bg-[#00D5BE]/10 transition-colors">
                            <i class="fas fa-location-dot text-[#00D5BE]"></i>
                        </span>
                        <span class="text-sm">Jalan Jenderal Sudirman No. 1, Padang</span>
                    </a>
                </div>
            </div>

            <div class="flex flex-col space-y-4">
                <a href="{{ route('home') }}" class="inline-block group">
                    <div class="flex items-center hover:opacity-90 transition-opacity">
                        <img src="{{ asset('images/mpp-logo.png') }}" class="h-16 object-contain transform group-hover:scale-105 transition-transform duration-300" alt="Logo MPP" />
                    </div>
                </a>
                <div>
                    <p class="text-gray-700 font-bold leading-relaxed">
                        Mal Pelayanan Publik Kota Padang
                    </p>
                    <a href="https://maps.app.goo.gl/wHWjyNKvmhTQe9hM7" target="_blank"
                       class="mt-4 flex items-center gap-3 text-gray-600 hover:text-[#00D5BE] transition-colors group">
                        <span class="bg-teal-50 p-2 rounded-lg group-hover:bg-[#00D5BE]/10 transition-colors">
                            <i class="fas fa-location-dot text-[#00D5BE]"></i>
                        </span>
                        <span class="text-sm">Plaza Andalas Lantai 4, Kota Padang</span>
                    </a>
                </div>
            </div>

            <div class="flex flex-col space-y-4">
                <h3 class="text-lg font-bold text-gray-800">Kontak Kami</h3>
                <div class="space-y-4">
                    <a href="mailto:dpmptsp@padang.go.id" 
                       class="flex items-center gap-3 text-gray-600 hover:text-[#00D5BE] transition-colors group">
                        <span class="bg-teal-50 p-2 rounded-lg group-hover:bg-[#00D5BE]/10 transition-colors">
                            <i class="fas fa-envelope text-[#00D5BE]"></i>
                        </span>
                        <span class="text-sm">dpmptsp@padang.go.id</span>
                    </a>
                    <a href="https://wa.me/6281374078088" target="_blank" 
                       class="flex items-center gap-3 text-gray-600 hover:text-[#00D5BE] transition-colors group">
                        <span class="bg-teal-50 p-2 rounded-lg group-hover:bg-[#00D5BE]/10 transition-colors">
                            <i class="fab fa-whatsapp text-[#00D5BE]"></i>
                        </span>
                        <span class="text-sm">+62 813-7407-8088</span>
                    </a>
                    <div class="flex items-center gap-3 pt-4">
                        <a href="https://instagram.com/dpmptsppadang" target="_blank"
                           class="bg-gradient-to-br from-[#00D5BE] to-teal-500 p-2.5 rounded-lg text-white hover:opacity-90 transform hover:scale-105 transition-all">
                            <i class="fab fa-instagram text-lg"></i>
                        </a>
                        <a href="https://www.youtube.com/@dpmptspkotapadang8461" target="_blank"
                           class="bg-gradient-to-br from-[#00D5BE] to-teal-500 p-2.5 rounded-lg text-white hover:opacity-90 transform hover:scale-105 transition-all">
                            <i class="fab fa-youtube text-lg"></i>
                        </a>
                        <a href="https://www.tiktok.com/@dpmptsppadang" target="_blank"
                           class="bg-gradient-to-br from-[#00D5BE] to-teal-500 p-2.5 rounded-lg text-white hover:opacity-90 transform hover:scale-105 transition-all">
                            <i class="fab fa-tiktok text-lg"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 pt-6 border-t border-teal-100">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-gray-600 text-center md:text-left">
                    © {{ date('Y') }} <span class="font-medium">DPMPTSP Kota Padang</span>. All Rights Reserved.
                </p>
            </div>
        </div>
    </div>
</footer>