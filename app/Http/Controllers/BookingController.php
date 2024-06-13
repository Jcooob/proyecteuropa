<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::where('user_id', Auth::id())->get();

        return view('bookings.index', compact('bookings'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create($roomId)
    {
        $room = Room::findOrFail($roomId);

        if ($room->state !== 'available') {
            return redirect()->route('rooms.show', $room->id)->with('error', 'La habitación no está disponible para reservas.');
        }

        return view('bookings.create', compact('room'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:rooms,id',
            'number_of_guests'=> 'required|integer|min:1',
            'starting_date' => 'required|date',
            'ending_date' => 'required|date|after:starting_date',
            'total_price' => 'required|numeric|min:0',
            'payment_method' => 'required|string'
        ]);
    
        Booking::create([
            'user_id' => $validatedData['user_id'],
            'room_id' => $validatedData['room_id'],
            'number_of_guests' => $validatedData['number_of_guests'],
            'starting_date' => $validatedData['starting_date'],
            'ending_date' => $validatedData['ending_date'],
            'total_price' => $validatedData['total_price'],
            'payment_method' => $validatedData['payment_method'],
        ]);

        $room = Room::find($validatedData['room_id']);
        $room->state = 'unavailable';
        $room->save();
    
        return redirect()->route('bookings.index')->with('success', 'Reserva realizada con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        return view('bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        return view('bookings.edit', compact('booking'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'number_of_guests' => 'required|integer|min:1',
            'starting_date' => 'required|date',
            'ending_date' => 'required|date|after:starting_date',
            'total_price' => 'required|numeric|min:0',
            'payment_method' => 'required|string'
        ]);
    
        // Actualizar la reserva
        $booking->update($validatedData);
    
        return redirect()->route('bookings.index')->with('success', 'Reserva actualizada con éxito.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $room = $booking->room;
        $room->state = 'available';
        $room->save();
    
        // Eliminar la reserva
        $booking->delete();
    
        return redirect()->route('bookings.index')->with('success', 'Reserva eliminada con éxito.');
    }
    
    
}
