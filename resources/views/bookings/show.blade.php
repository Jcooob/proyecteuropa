<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles de la Reserva') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex justify-between">
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold">Reserva para la habitación: {{ ucfirst(strtolower($booking->room->category)) }} {{ $booking->room->room_number }}</h3>
                        <p><strong>Fecha de Entrada:</strong> {{ $booking->starting_date }}</p>
                        <p><strong>Fecha de Salida:</strong> {{ $booking->ending_date }}</p>
                        <p><strong>Personas:</strong> {{ $booking->number_of_guests }}</p>
                        <p><strong>Precio Total:</strong> ${{ $booking->total_price }}</p>
                        <p><strong>Método de Pago:</strong> {{ ucfirst(strtolower($booking->payment_method)) }}</p>
                        <div class="mt-4">
                            <a href="{{ route('bookings.edit', $booking->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Editar
                            </a>
                            <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta reserva?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="flex-shrink-0 ml-4">
                        <img src="{{ $booking->room->picture }}" alt="Imagen de la habitación" class="w-64 h-64 object-cover rounded-md">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
