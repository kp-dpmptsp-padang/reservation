<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tidak Ditemukan | DPMPTSP Kota Padang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="/images/Logo_Padang.svg">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-white to-teal-50/30 px-4">
        <div class="text-center">
            <h1 class="text-9xl font-bold bg-gradient-to-r from-teal-600 to-[#00D5BE] bg-clip-text text-transparent animate-pulse">
                404
            </h1>
            
            <div class="mt-6 space-y-2">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800">
                    Halaman Tidak Ditemukan
                </h2>
                <p class="text-gray-600 max-w-lg mx-auto">
                    Mohon maaf, halaman yang Anda cari tidak dapat ditemukan. Silakan kembali ke halaman utama atau hubungi kami untuk bantuan.
                </p>
            </div>

            <div class="mt-8 flex justify-center space-x-3">
                <div class="w-16 h-1 rounded-full bg-teal-200"></div>
                <div class="w-3 h-1 rounded-full bg-[#00D5BE]"></div>
                <div class="w-1 h-1 rounded-full bg-teal-600"></div>
            </div>

            <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('home') }}" 
                   class="group relative px-6 py-3 w-full sm:w-auto bg-[#00D5BE] text-white rounded-xl font-medium shadow-lg shadow-teal-200 hover:shadow-xl hover:shadow-teal-200 transition-all duration-300 hover:-translate-y-0.5">
                    <span class="relative flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform group-hover:-translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali ke Beranda
                    </span>
                </a>

                <a href="https://wa.me/6281374078088?text=Halo, saya membutuhkan bantuan terkait website penerimaan kunjungan DPMPTSP Kota Padang" 
                   target="_blank"
                   class="group relative px-6 py-3 w-full sm:w-auto bg-white text-gray-700 rounded-xl font-medium border-2 border-teal-100 hover:border-[#00D5BE] shadow-lg shadow-teal-50 hover:shadow-xl hover:shadow-teal-100 transition-all duration-300 hover:-translate-y-0.5">
                    <span class="relative flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#00D5BE] transition-transform group-hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Butuh Bantuan?
                    </span>
                </a>
            </div>

            <div class="mt-16 flex justify-center space-x-1">
                <div class="w-1 h-1 rounded-full bg-teal-600"></div>
                <div class="w-3 h-1 rounded-full bg-[#00D5BE]"></div>
                <div class="w-16 h-1 rounded-full bg-teal-200"></div>
            </div>
        </div>
    </div>
</body>
</html>