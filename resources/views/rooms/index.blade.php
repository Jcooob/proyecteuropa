<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Habitaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($rooms as $room)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <img src="{{ asset($room->picture) }}" alt="{{ $room->room_number }}" class="w-full h-64 object-cover">
                        <div class="p-4">
                            <h2 class="text-lg font-semibold">{{ $room->category }}</h2>
                            <p class="text-gray-600">Capacidad: {{ $room->capacity }}</p>
                            <p class="text-gray-600">Precio por noche: ${{ $room->price_per_night }}</p>
                            <p class="text-gray-600">{{ $room->description }}</p>
                            <p class="text-gray-600">{{ $room->state }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
