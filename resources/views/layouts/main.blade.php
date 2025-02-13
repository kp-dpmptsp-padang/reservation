<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title', default: config('app.name', 'DPMPTSP Kota Padang'))</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="/images/Logo_Padang.svg">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Google Poppins Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="overflow-x-hidden">
    @include('partials.navbar-user')
    <main>
        @yield('content')   
        @stack('scripts')
    </main>
    @include('partials.footer-user')

    <script>
        const btn = document.querySelector("button[data-collapse-toggle='navbar-default']");
        const menu = document.querySelector("#navbar-default");
        
        btn.addEventListener("click", () => {
            menu.classList.toggle("hidden");
        });
    </script>
</body>
</html>