<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Habitaciones') }}
            </h2>
            <div class="flex items-center gap-4">
                <!-- Filtro por estado -->
                <div>
                    <label for="state" class="block text-sm font-medium text-gray-700">Filtrar por estado:</label>
                    <select id="state" name="state" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="all">Todos</option>
                        <option value="available">Disponible</option>
                        <option value="unavailable">No disponible</option>
                        <option value="maintenance">Mantenimiento</option>
                    </select>
                </div>

                <!-- Filtro por categoría -->
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700">Filtrar por categoría:</label>
                    <select id="category" name="category" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="all">Todas</option>
                        <option value="single">Individual</option>
                        <option value="double">Doble</option>
                        <option value="suite">Suite</option>
                        <option value="family">Familiar</option>
                        <option value="deluxe">Deluxe</option>
                        <option value="standard">Estándar</option>
                        <option value="presidential">Presidencial</option>
                        <option value="economy">Económica</option>
                        <option value="business">Negocios</option>
                    </select>
                </div>

                <!-- Ordenar por precio -->
                <div>
                    <label for="sortPrice" class="block text-sm font-medium text-gray-700">Ordenar por precio:</label>
                    <select id="sortPrice" name="sortPrice" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="none">Ninguno</option>
                        <option value="asc">Ascendente</option>
                        <option value="desc">Descendente</option>
                    </select>
                </div>

                <button onclick="filterAndSortRooms()" class="bg-black text-white py-2 px-4 rounded-md shadow-lg hover:bg-gray-800 transition duration-300 mt-4 md:mt-0">
                    Aplicar filtros
                </button>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id="rooms-container" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($rooms as $room)
                    <div class="room-card bg-white overflow-hidden shadow-sm sm:rounded-lg" data-state="{{ $room->state }}" data-category="{{ $room->category }}" data-price="{{ $room->price_per_night }}">
                        <img src="{{ $room->picture }}" alt="{{ $room->room_number }}" class="w-full h-64 object-cover">
                        <div class="p-4">
                            <h2 class="text-lg font-semibold">{{ $room->category }}</h2>
                            <p class="text-gray-600">Capacidad: {{ $room->capacity }}</p>
                            <p class="text-gray-600">Precio por noche: ${{ $room->price_per_night }}</p>
                            <p class="text-gray-600">{{ $room->description }}</p>
                            <p class="text-gray-600">Estado: {{ $room->state }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        function filterAndSortRooms() {
            const state = document.getElementById('state').value;
            const category = document.getElementById('category').value;
            const sortPrice = document.getElementById('sortPrice').value;
            const rooms = Array.from(document.querySelectorAll('.room-card'));

            // Filter rooms
            rooms.forEach(room => {
                const roomState = room.getAttribute('data-state');
                const roomCategory = room.getAttribute('data-category');
                const showState = state === 'all' || roomState === state;
                const showCategory = category === 'all' || roomCategory === category;

                if (showState && showCategory) {
                    room.style.display = 'block';
                } else {
                    room.style.display = 'none';
                }
            });

            // Sort rooms by price
            if (sortPrice !== 'none') {
                const sortedRooms = rooms.sort((a, b) => {
                    const priceA = parseFloat(a.getAttribute('data-price'));
                    const priceB = parseFloat(b.getAttribute('data-price'));
                    return sortPrice === 'asc' ? priceA - priceB : priceB - priceA;
                });

                const container = document.getElementById('rooms-container');
                container.innerHTML = '';
                sortedRooms.forEach(room => container.appendChild(room));
            }
        }
    </script>
</x-app-layout>
