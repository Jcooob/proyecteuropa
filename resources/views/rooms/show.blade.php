<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles de la Habitación') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex">
                <div class="w-1/2 p-6 flex flex-col justify-between">
                    <h2 class="text-lg font-semibold">{{ ucfirst($room->category) }} {{ $room->room_number }}</h2>
                    <p class="text-gray-600">Número de habitación: {{ $room->room_number }}</p>
                    <p class="text-gray-600">Capacidad: {{ $room->capacity }}</p>
                    <p class="text-gray-600">Precio por noche: ${{ $room->price_per_night }}</p>
                    <p class="text-gray-600">{{ $room->description }}</p>
                    <p class="text-gray-600">
                        Estado:
                        <span class="
                            @php
                                switch ($room->state) {
                                    case 'maintenance':
                                        echo 'text-yellow-500';
                                        break;
                                    case 'available':
                                        echo 'text-green-500';
                                        break;
                                    default:
                                        echo 'text-red-500';
                                }
                            @endphp
                        ">
                            @php
                                switch ($room->state) {
                                    case 'maintenance':
                                        echo 'Mantenimiento';
                                        break;
                                    case 'available':
                                        echo 'Disponible';
                                        break;
                                    default:
                                        echo 'No Disponible';
                                }
                            @endphp
                        </span>
                    </p>
                    @if ($room->state === 'available')
                    <a href="{{ route('bookings.create', $room->id) }}" class="mt-auto bg-gray-800 hover:bg-gray-700 text-white py-2 px-4 rounded-md shadow-lg transition duration-300">
                            Generar reserva
                        </a>
                    @else
                        <button class="mt-auto bg-gray-300 text-gray-600 py-2 px-4 rounded-md shadow-lg cursor-not-allowed" disabled>
                            Generar reserva
                        </button>
                    @endif
                </div>
                <div class="w-1/2">
                    <img src="{{ $room->picture }}" alt="{{ $room->room_number }}" class="w-full h-auto">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
