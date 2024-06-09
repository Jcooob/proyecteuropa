<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar Sesión</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .carousel-bg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: opacity 1s ease-in-out;
        }
    </style>
</head>
<body class="bg-gray-100  text-gray-900 flex items-center justify-center min-h-screen relative">

    <div id="carousel">
        <img src="{{ asset('storage/Hotel_6.jpg') }}" alt="Background Image 1" class="carousel-bg opacity-100">
        <img src="{{ asset('storage/Hotel_7.jpg') }}" alt="Background Image 2" class="carousel-bg opacity-0">
        <img src="{{ asset('storage/Hotel_5.jpeg') }}" alt="Background Image 3" class="carousel-bg opacity-0">
    </div>

    <div class="absolute top-4 left-4 z-20">
        <a href="{{ url('/') }}" class="bg-black hover:bg-gray-800 transition duration-300 text-white font-semibold py-2 px-4 rounded-md shadow-lg">
            {{ __('Regresar a la página principal') }}
        </a>
    </div>

    <div class="bg-white bg-opacity-90 p-8 rounded-lg shadow-lg w-full max-w-md relative z-10">
        <h2 class="text-3xl font-bold text-center text-gray-900 mb-6">Iniciar Sesión</h2>

        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                <input id="email" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                @error('email')
                    <span class="text-sm text-red-600">Este email no se encuentra registrado</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Contraseña') }}</label>
                <input id="password" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" type="password" name="password" required autocomplete="current-password" />
                @error('password')
                    <span class="text-sm text-red-600">La contraseña no coincide</span>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center mb-4">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <label for="remember_me" class="ml-2 text-sm text-gray-600">{{ __('Recordar datos') }}</label>
            </div>

            <div class="flex items-center justify-between">
                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Olvidaste tu contraseña?') }}
                    </a>
                @endif

                <button class="bg-black hover:bg-gray-800 transition duration-300 text-white font-semibold py-2 px-4 rounded-md shadow-lg">
                    {{ __('Ingresar') }}
                </button>
            </div>

            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                    {{ __('Aún no estás registrado?') }}
            </a>

        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const images = document.querySelectorAll('.carousel-bg');
            let currentIndex = 0;

            setInterval(() => {
                images[currentIndex].classList.remove('opacity-100');
                images[currentIndex].classList.add('opacity-0');
                currentIndex = (currentIndex + 1) % images.length;
                images[currentIndex].classList.remove('opacity-0');
                images[currentIndex].classList.add('opacity-100');
            }, 5000);
        });
    </script>

</body>
</html>
