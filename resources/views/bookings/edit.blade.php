<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Reserva') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="number_of_guests" class="block text-sm font-medium text-gray-700">Cantidad de personas:</label>
                            <input type="number" id="number_of_guests" name="number_of_guests" value="{{ $booking->number_of_guests }}" min="1" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        </div>
                        <div class="mt-4">
                            <label for="starting_date" class="block text-sm font-medium text-gray-700">Fecha de entrada:</label>
                            <input type="date" id="starting_date" name="starting_date" value="{{ $booking->starting_date }}" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        </div>
                        <div class="mt-4">
                            <label for="ending_date" class="block text-sm font-medium text-gray-700">Fecha de salida:</label>
                            <input type="date" id="ending_date" name="ending_date" value="{{ $booking->ending_date }}" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        </div>
                        <div class="mt-4">
                            <label for="payment_method" class="block text-sm font-medium text-gray-700">Método de pago:</label>
                            <select id="payment_method" name="payment_method" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option value="credit_card" {{ $booking->payment_method == 'credit_card' ? 'selected' : '' }}>Tarjeta de crédito</option>
                                <option value="debit_card" {{ $booking->payment_method == 'debit_card' ? 'selected' : '' }}>Tarjeta de débito</option>
                                <option value="cash" {{ $booking->payment_method == 'cash' ? 'selected' : '' }}>Efectivo</option>
                                <option value="paypal" {{ $booking->payment_method == 'paypal' ? 'selected' : '' }}>PayPal</option>
                            </select>
                        </div>
                        <div class="mt-4">
                            <label for="total_price" class="block text-sm font-medium text-gray-700">Precio total:</label>
                            <input type="number" id="total_price" name="total_price" value="{{ $booking->total_price }}" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" readonly>
                        </div>
                        <div class="mt-6">
                            <button type="submit" class="bg-gray-800 hover:bg-gray-700 text-white py-2 px-4 rounded-md shadow-lg transition duration-300">
                                Guardar Cambios
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
