<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hotel Landing Page</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- Custom CSS for Carousel -->
        <style>
            .carousel {
                position: relative;
                width: 100%;
                height: 100%;
                overflow: hidden;
            }
            .carousel img {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                object-fit: cover;
                opacity: 0;
                transition: opacity 1s ease-in-out;
            }
            .carousel img.active {
                opacity: 1;
            }
        </style>
    </head>
    <body class="bg-gray-100 text-gray-900">
        <div class="relative min-h-screen">
            <div class="carousel absolute inset-0">
                <img src="{{ asset('storage/Hotel_1.jpg') }}" alt="Hotel Image 1" class="active">
                <img src="{{ asset('storage/Hotel_2.jpg') }}" alt="Hotel Image 2">
                <img src="{{ asset('storage/Hotel_3.jpg') }}" alt="Hotel Image 3">
            </div>
            <div class="relative z-10 bg-black bg-opacity-60 min-h-screen flex flex-col justify-between">
                <header class="container mx-auto p-6 flex justify-between items-center">
                    <div class="text-white text-lg font-bold">HotelPHP</div>
                    <nav>
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-white text-lg mx-2">Habitaciones</a>
                            @else
                                    <a href="{{ route('login') }}" class="text-white text-lg mx-2 py-2 px-6 rounded-full hover:bg-black transition duration-300">Ingresa </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="text-white text-lg mx-2 py-2 px-6 rounded-full hover:bg-black transition duration-300">Registrate</a>
                                @endif
                            @endauth
                        @endif
                    </nav>
                </header>
                <main class="container mx-auto flex flex-col items-center justify-center flex-1 px-6">
                    <h1 class="text-5xl text-white font-bold mb-6 text-center">Bienvenido a HotelPHP</h1>
                    <p class="text-xl text-white text-center mb-6">Disfruta de una estancia inolvidable con nosotros</p>
                    <a href="#book-now" class="bg-black text-white py-2 px-6 rounded-full text-lg font-semibold hover:bg-gray-800 transition duration-300">Reservar Ahora</a>
                </main>
                <footer class="bg-black text-white py-4">
                    <div class="container mx-auto text-center">
                        &copy; 2024 HotelPHP. Todos los derechos reservados.
                    </div>
                </footer>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const images = document.querySelectorAll('.carousel img');
                let currentIndex = 0;

                function showNextImage() {
                    images[currentIndex].classList.remove('active');
                    currentIndex = (currentIndex + 1) % images.length;
                    images[currentIndex].classList.add('active');
                }

                setInterval(showNextImage, 5000); // Cambiar imagen cada 5 segundos
            });
        </script>
    </body>
</html>
