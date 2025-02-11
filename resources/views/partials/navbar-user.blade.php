<nav class="bg-white fixed w-full z-20 top-0 start-0 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('home') }}">
                    <img class="h-10 w-auto" src="{{ asset('images/dpmptsp.png') }}" alt="Logo DPMPTSP">
                </a>
            </div>

            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}" 
                   class="text-sm font-medium transition-colors duration-300 {{ request()->routeIs('home') ? 'text-[#00D5BE]' : 'text-gray-700 hover:text-[#00D5BE]' }}">
                    Beranda
                </a>
                <x-button href="{{ route('reservation') }}" variant="primary" size="sm">
                    Reservasi
                </x-button>
            </div>

            <div class="md:hidden flex items-center">
                <button onclick="toggleMenu()"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-[#00D5BE]">
                    <span class="sr-only">Open main menu</span>
                    <svg id="menuIcon" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="closeIcon" class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="mobileMenu" class="hidden md:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="{{ route('home') }}"
               class="block px-3 py-2 rounded-md text-base font-medium transition-colors duration-300 {{ request()->routeIs('home') ? 'text-[#00D5BE]' : 'text-gray-700 hover:text-[#00D5BE]' }}">
                Beranda
            </a>
            <a href="#"
               class="block px-3 py-2 rounded-md text-base font-medium text-white bg-[#00D5BE] hover:bg-[#00b4a1] transition duration-300 ease-out">
                Reservasi
            </a>
        </div>
    </div>
</nav>

<script>
    function toggleMenu() {
        const mobileMenu = document.getElementById('mobileMenu');
        const menuIcon = document.getElementById('menuIcon');
        const closeIcon = document.getElementById('closeIcon');
        
        if (mobileMenu.classList.contains('hidden')) {
            mobileMenu.classList.remove('hidden');
            menuIcon.classList.add('hidden');
            closeIcon.classList.remove('hidden');
        } else {
            mobileMenu.classList.add('hidden');
            menuIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
        }
    }
</script>