<nav class="fixed w-full z-20 top-0 start-0 transition-all duration-300" id="navbar">
    <div class="bg-white md:bg-transparent transition-all duration-300" id="navbarContainer">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <img class="h-10 w-auto" src="{{ asset('images/dpmptsp.png') }}" alt="Logo DPMPTSP">
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" id="homeLink"
                    class="text-sm font-medium transition-all duration-300 inline-flex items-center rounded-full px-4 py-2 {{ request()->routeIs('home') ? 'text-[#00D5BE]' : 'text-white hover:text-[#00D5BE]' }}">
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
        <div id="mobileMenu" class="hidden md:hidden bg-white border-t">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="{{ route('home') }}"
                class="block px-3 py-2 rounded-md text-base font-medium transition-colors duration-300 {{ request()->routeIs('home') ? 'text-[#00D5BE]' : 'text-gray-700 hover:text-[#00D5BE]' }}">
                    Beranda
                </a>
                <a href="{{ route('reservation') }}"
                class="block px-3 py-2 rounded-md text-base font-medium text-white bg-[#00D5BE] hover:bg-[#00b4a1] transition duration-300 ease-out">
                    Reservasi
                </a>
            </div>
        </div>
    </div>
</nav>

<script>
    function toggleMenu() {
        const mobileMenu = document.getElementById('mobileMenu');
        const menuIcon = document.getElementById('menuIcon');
        const closeIcon = document.getElementById('closeIcon');
        const navbarContainer = document.getElementById('navbarContainer');
       
        if (mobileMenu.classList.contains('hidden')) {
            mobileMenu.classList.remove('hidden');
            menuIcon.classList.add('hidden');
            closeIcon.classList.remove('hidden');
            navbarContainer.classList.add('shadow-md');
        } else {
            mobileMenu.classList.add('hidden');
            menuIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
            navbarContainer.classList.remove('shadow-md');
        }
    }

    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('navbar');
        const navbarContainer = document.getElementById('navbarContainer');
        const homeLink = document.getElementById('homeLink');
        const mobileMenu = document.getElementById('mobileMenu');
        
        if (window.scrollY > 10) {
            navbar.classList.add('bg-white', 'shadow-md');
            navbar.classList.remove('bg-transparent');
            
            homeLink.classList.remove('bg-gray-900', 'text-white');
            homeLink.classList.add('text-gray-700');
        } else {
            navbar.classList.remove('bg-white', 'shadow-md');
            navbar.classList.add('bg-transparent');
            
            homeLink.classList.add('bg-gray-900', 'text-white');
            homeLink.classList.remove('text-gray-700');
        }
    });

    window.dispatchEvent(new Event('scroll'));
</script>