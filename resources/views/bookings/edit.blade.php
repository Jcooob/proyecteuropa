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
                    <div class="flex items-center mb-6">
                        <img src="{{ $room->picture }}" alt="{{ $room->room_number }}" class="w-32 h-32 object-cover rounded-md mr-4">
                        <div>
                            <h2 class="text-xl font-semibold">{{ ucfirst($room->category) }} {{ $room->room_number }}</h2>
                            <p class="text-gray-600">Precio por noche: ${{ $room->price_per_night }}</p>
                            <p class="text-gray-600">Capacidad: Max. {{ $room->capacity }} personas</p>
                        </div>
                    </div>
                    <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
                        @csrf
                        @method('PUT') <!-- Aquí agregamos el método PUT -->

                        <input type="hidden" id="price_per_night" value="{{ $room->price_per_night }}">
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <input type="hidden" name="room_id" value="{{ $room->id }}">

                        <div>
                            <label for="number_of_guests" class="block text-sm font-medium text-gray-700">Cantidad de personas:</label>
                            <input type="number" id="number_of_guests" name="number_of_guests" min="1" max="{{ $room->capacity }}" value="{{ old('number_of_guests', $booking->number_of_guests) }}" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        </div>
                        <div class="mt-4">
                            <label for="starting_date" class="block text-sm font-medium text-gray-700">Fecha de entrada:</label>
                            <input type="date" id="starting_date" name="starting_date" min="{{ now()->format('Y-m-d') }}" value="{{ old('starting_date', $booking->starting_date) }}" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        </div>
                        <div class="mt-4">
                            <label for="ending_date" class="block text-sm font-medium text-gray-700">Fecha de salida:</label>
                            <input type="date" id="ending_date" name="ending_date" min="{{ now()->format('Y-m-d') }}" value="{{ old('ending_date', $booking->ending_date) }}" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        </div>
                        <div class="mt-4">
                            <label for="total_days" class="block text-sm font-medium text-gray-700">Total de días:</label>
                            <input type="number" id="total_days" name="total_days" value="{{ old('total_days', $booking->total_days) }}" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" readonly>
                        </div>
                        <div class="mt-4">
                            <label for="total_price" class="block text-sm font-medium text-gray-700">Precio total:</label>
                            <div class="relative mt-1">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">$</span>
                                <input type="number" id="total_price" name="total_price" value="{{ old('total_price', $booking->total_price) }}" class="block w-full pl-7 pr-12 border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" readonly>
                            </div>
                        </div>
                        <div class="mt-4">
                            <label for="payment_method" class="block text-sm font-medium text-gray-700">Método de pago:</label>
                            <select id="payment_method" name="payment_method" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option value="credit_card" {{ old('payment_method', $booking->payment_method) == 'credit_card' ? 'selected' : '' }}>Tarjeta de crédito</option>
                                <option value="debit_card" {{ old('payment_method', $booking->payment_method) == 'debit_card' ? 'selected' : '' }}>Tarjeta de débito</option>
                                <option value="cash" {{ old('payment_method', $booking->payment_method) == 'cash' ? 'selected' : '' }}>Efectivo</option>
                                <option value="paypal" {{ old('payment_method', $booking->payment_method) == 'paypal' ? 'selected' : '' }}>PayPal</option>
                            </select>
                        </div>
                        <div class="mt-6 flex justify-between space-x-4">
                            <button type="submit" class="bg-gray-800 hover:bg-gray-700 text-white py-2 px-4 rounded-md shadow-lg transition duration-300 w-full text-center">
                                Guardar Cambios
                            </button>
                            <a href="{{ route('bookings.index') }}" class="bg-gray-800 hover:bg-gray-700 text-white py-2 px-4 rounded-md shadow-lg transition duration-300 w-full text-center">
                                Volver
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkinInput = document.getElementById('starting_date');
            const checkoutInput = document.getElementById('ending_date');
            const totalDaysInput = document.getElementById('total_days');
            const totalPriceInput = document.getElementById('total_price');
            const pricePerNight = parseFloat(document.getElementById('price_per_night').value);

            const today = new Date().toISOString().split('T')[0];
            checkinInput.setAttribute('min', today);
            checkoutInput.setAttribute('min', today);

            function calculateTotal() {
                const checkinDate = new Date(checkinInput.value);
                const checkoutDate = new Date(checkoutInput.value);

                if (checkinDate && checkoutDate && checkoutDate > checkinDate) {
                    const timeDifference = checkoutDate - checkinDate;
                    const totalDays = timeDifference / (1000 * 3600 * 24);
                    
                    totalDaysInput.value = totalDays;
                    totalPriceInput.value = totalDays * pricePerNight;
                } else {
                    totalDaysInput.value = 0;
                    totalPriceInput.value = 0;
                }

                checkoutInput.setAttribute('min', checkinInput.value);
            }

            checkinInput.addEventListener('change', calculateTotal);
            checkoutInput.addEventListener('change', calculateTotal);

            // Calcular total al cargar la página
            calculateTotal();
        });
    </script>
</x-app-layout>
