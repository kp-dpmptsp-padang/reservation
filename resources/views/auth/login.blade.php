<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - DPMPTSP Kota Padang</title>
    <link rel="icon" href="/images/Logo_Padang.svg" type="image/svg+xml">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Google Poppins Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    backgroundImage: {
                        'login-bg': "url('/images/login-bg.jpg')"
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-login-bg bg-cover bg-center bg-no-repeat min-h-screen">
    <div class="min-h-screen flex items-center justify-center p-4 bg-black/40">
        <div class="w-full max-w-md bg-white/95 backdrop-blur-lg rounded-2xl shadow-2xl overflow-hidden">
            <div class="p-8">
                <!-- Header -->
                <div class="text-center">
                    <div class="relative">
                        <div class="absolute -top-2 -left-2 w-20 h-20 bg-[#00D5BE]/10 rounded-full blur-xl"></div>
                        <div class="absolute -top-2 -right-2 w-20 h-20 bg-blue-500/10 rounded-full blur-xl"></div>
                        <img 
                            src="/images/Logo_Padang.svg" 
                            alt="Logo Padang"
                            class="relative mx-auto h-20"
                        >
                    </div>
                    <h2 class="mt-6 text-2xl font-bold text-gray-900">
                        Admin Login
                    </h2>
                    <p class="mt-2 text-sm text-gray-600">
                        Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu
                    </p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status :status="session('status')" />

                <!-- Form -->
                <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-6">
                    @csrf
                    
                    <div class="space-y-4">
                        <!-- Email Field -->
                        <div class="group">
                            <label for="email" class="block text-sm font-medium text-gray-700">
                                {{ __('Email') }}
                            </label>
                            <div class="mt-1 relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-envelope text-gray-400 group-focus-within:text-[#00D5BE] transition-colors"></i>
                                </div>
                                <input
                                    id="email"
                                    type="email"
                                    name="email"
                                    :value="old('email')"
                                    required
                                    autofocus
                                    autocomplete="username"
                                    class="appearance-none block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#00D5BE] focus:border-[#00D5BE] sm:text-sm transition-all"
                                    placeholder="Masukkan email anda"
                                >
                            </div>
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div class="group">
                            <label for="password" class="block text-sm font-medium text-gray-700">
                                {{ __('Password') }}
                            </label>
                            <div class="mt-1 relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-gray-400 group-focus-within:text-[#00D5BE] transition-colors"></i>
                                </div>
                                <input
                                    id="password"
                                    type="password"
                                    name="password"
                                    required
                                    autocomplete="current-password"
                                    class="appearance-none block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#00D5BE] focus:border-[#00D5BE] sm:text-sm transition-all"
                                    placeholder="Masukkan password anda"
                                >
                            </div>
                            @error('password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input
                                id="remember_me"
                                type="checkbox"
                                name="remember"
                                class="h-4 w-4 text-[#00D5BE] focus:ring-[#00D5BE] border-gray-300 rounded cursor-pointer"
                            >
                            <label for="remember_me" class="ml-2 block text-sm text-gray-900 cursor-pointer">
                                {{ __('Remember me') }}
                            </label>
                        </div>

                        @if (Route::has('password.request'))
                            <div class="text-sm">
                                <a href="{{ route('password.request') }}" class="font-medium text-[#00D5BE] hover:text-[#00b4a1] transition-colors">
                                    {{ __('Forgot your password?') }}
                                </a>
                            </div>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <x-button type="submit" variant="primary" size="default" class="w-full justify-center hover:scale-[1.02] shadow-lg">
                            {{ __('Log in') }}
                        </x-button>
                    </div>
                </form>

                <!-- Footer -->
                <div class="mt-8 text-center text-sm text-gray-600">
                    <p>&copy; {{ date('Y') }} DPMPTSP Kota Padang. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>