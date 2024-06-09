<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro</title>
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
<body class="bg-gray-100 text-gray-900 flex items-center justify-center min-h-screen relative">

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
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Registro</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Nombre') }}</label>
                <input id="name" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                @error('name')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Last Name -->
            <div class="mb-4">
                <label for="last_name" class="block text-sm font-medium text-gray-700">{{ __('Apellido') }}</label>
                <input id="last_name" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" type="text" name="last_name" :value="old('last_name')" required autocomplete="last_name" />
                @error('last_name')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Phone Number -->
            <div class="mb-4">
                <label for="phone_number" class="block text-sm font-medium text-gray-700">{{ __('Número de teléfono') }}</label>
                <input id="phone_number" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" type="tel" name="phone_number" :value="old('phone_number')" required autocomplete="phone_number" />
                @error('phone_number')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>


            <!-- Nationality -->
            <div class="mb-4">
                <label for="nationality" class="block text-sm font-medium text-gray-700">{{ __('Nacionalidad') }}</label>
                <input id="nationality" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" type="text" name="nationality" :value="old('nationality')" required autocomplete="nationality" />
                @error('nationality')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Age -->
            <div class="mb-4">
                <label for="age" class="block text-sm font-medium text-gray-700">{{ __('Edad') }}</label>
                <input id="age" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" type="number" name="age" :value="old('age')" required autocomplete="age" />
                @error('age')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Passport Number -->
            <div class="mb-4">
                <label for="passport_number" class="block text-sm font-medium text-gray-700">{{ __('Número de pasaporte') }}</label>
                <input id="passport_number" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" type="text" name="passport_number" :value="old('passport_number')" required autocomplete="passport_number" />
                @error('passport_number')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                <input id="email" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" type="email" name="email" :value="old('email')" required autocomplete="username" />
                @error('email')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Contraseña') }}</label>
                <input id="password" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" type="password" name="password" required autocomplete="new-password" />
                @error('password')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">{{ __('Confirmar contraseña') }}</label>
                <input id="password_confirmation" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" type="password" name="password_confirmation" required autocomplete="new-password" />
                @error('password_confirmation')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <a class="underline text-sm text-gray-900 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Ya tengo una cuenta') }}
                </a>

                <button class="bg-black hover:bg-gray-800 transition duration-300 text-white font-semibold py-2 px-4 rounded-md shadow-lg">
                    {{ __('Registrarse') }}
                </button>
            </div>
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
