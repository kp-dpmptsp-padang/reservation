@extends('layouts.main')
@section('title', 'Reservasi Berhasil | DPMPTSP Kota Padang')
@section('content')

<div class="min-h-screen bg-gradient-to-b from-gray-50 to-gray-100 py-12 pt-32">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
            <div class="relative">
                <div class="absolute inset-0 bg-gradient-to-r from-[#00D5BE]/10 to-[#00A499]/10">
                    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNMTAwIDBoMTAwdjIwMEgxMDBsNTAtNTB6IiBmaWxsPSIjZmZmIiBmaWxsLW9wYWNpdHk9Ii4wNSIvPjwvc3ZnPg==')] opacity-10"></div>
                </div>

                <div class="relative p-8">
                    <div class="mx-auto flex items-center justify-center h-24 w-24 rounded-full bg-gradient-to-r from-[#00D5BE] to-[#00A499]">
                        <svg class="h-14 w-14 text-white animate-[bounce_1s_ease-in-out_1]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>

                    <div class="mt-6 text-center">
                        <h2 class="text-3xl font-bold text-gray-900">Reservasi Berhasil!</h2>
                        <p class="mt-2 text-lg text-gray-600">Terima kasih sudah ingin berkunjung ke DPMPTSP Kota Padang</p>
                    </div>

                    <div class="mt-8 bg-gray-50 rounded-xl p-6 border border-gray-100 shadow-sm">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                            <svg class="h-5 w-5 mr-2 text-[#00D5BE]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            Detail Reservasi
                        </h3>
                        <dl class="space-y-3">
                            <div class="grid grid-cols-1 sm:grid-cols-2 p-2 hover:bg-gray-100 rounded-lg transition-colors duration-150">
                                <dt class="text-sm font-medium text-gray-500">Nama</dt>
                                <dd class="text-sm font-medium text-gray-900">{{ $visit->name }}</dd>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 p-2 hover:bg-gray-100 rounded-lg transition-colors duration-150">
                                <dt class="text-sm font-medium text-gray-500">Tanggal Kunjungan</dt>
                                <dd class="text-sm font-medium text-gray-900">{{ \Carbon\Carbon::parse($visit->day)->isoFormat('dddd, D MMMM Y') }}</dd>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 p-2 hover:bg-gray-100 rounded-lg transition-colors duration-150">
                                <dt class="text-sm font-medium text-gray-500">Waktu</dt>
                                <dd class="text-sm font-medium text-gray-900">{{ \Carbon\Carbon::parse($visit->clock)->format('H:i') }} WIB</dd>
                            </div>
                        </dl>
                    </div>

                    <div class="mt-8 bg-gradient-to-r from-blue-50 to-blue-100 rounded-xl p-6 border border-blue-200">
                        <h3 class="text-lg font-semibold text-blue-800 mb-4 flex items-center">
                            <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                            Langkah Selanjutnya
                        </h3>
                        <div class="space-y-4">
                            <p class="text-blue-700">
                                Silakan konfirmasi reservasi Anda melalui WhatsApp dengan mengirimkan pesan ke nomor admin kami untuk proses verifikasi lebih lanjut.
                            </p>
                            
                            <a href="https://wa.me/{{ $whatsappNumber }}?text=Halo, saya {{ urlencode($visit->name) }} ingin mengkonfirmasi reservasi kunjungan untuk tanggal {{ urlencode(\Carbon\Carbon::parse($visit->day)->isoFormat('D MMMM Y')) }} pukul {{ urlencode(\Carbon\Carbon::parse($visit->clock)->format('H:i')) }} WIB" 
                               target="_blank"
                               class="inline-flex items-center w-full justify-center px-6 py-3 border border-transparent text-base font-medium rounded-lg shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-150">
                                <svg class="h-5 w-5 mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824zm-3.423-14.416c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm.029 18.88c-1.161 0-2.305-.292-3.318-.844l-3.677.964.984-3.595c-.607-1.052-.927-2.246-.926-3.468.001-3.825 3.113-6.937 6.937-6.937 1.856.001 3.598.723 4.907 2.034 1.31 1.311 2.031 3.054 2.03 4.908-.001 3.825-3.113 6.938-6.937 6.938z"/>
                                </svg>
                                Konfirmasi via WhatsApp
                            </a>
                        </div>
                    </div>

                    <div class="mt-8 text-center space-y-4">
                        <a href="{{ route('home') }}" class="inline-flex items-center text-[#00D5BE] hover:text-[#00A499] font-medium transition-colors duration-150">
                            <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection