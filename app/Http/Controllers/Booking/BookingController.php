<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function search()
    {
        $rooms = Room::where('is_available', true)->get();
        return view('booking.search', ['rooms' => $rooms]);
    }

    public function availableRooms()
    {
        $checkIn = request('check_in');
        $checkOut = request('check_out');

        $rooms = Room::where('is_available', true)
            ->whereNotIn('id', function ($query) use ($checkIn, $checkOut) {
                $query->select('room_id')
                    ->from('orders')
                    ->where('status', '!=', 'cancelled')
                    ->where(function ($q) use ($checkIn, $checkOut) {
                        $q->whereBetween('check_in_date', [$checkIn, $checkOut])
                          ->orWhereBetween('check_out_date', [$checkIn, $checkOut]);
                    });
            })
            ->get();

        return response()->json(['rooms' => $rooms]);
    }

    public function create($roomId)
    {
        $room = Room::findOrFail($roomId);
        return view('booking.create', ['room' => $room]);
    }

    public function store()
    {
        $this->middleware('auth');
        
        $validated = request()->validate([
            'room_id' => 'required|exists:rooms,id',
            'check_in_date' => 'required|date|after:today',
            'check_out_date' => 'required|date|after:check_in_date',
        ]);

        $room = Room::findOrFail($validated['room_id']);
        $nights = (strtotime($validated['check_out_date']) - strtotime($validated['check_in_date'])) / 86400;
        $totalPrice = $room->price_per_night * $nights;

        $order = Order::create([
            'user_id' => Auth::id(),
            'room_id' => $validated['room_id'],
            'check_in_date' => $validated['check_in_date'],
            'check_out_date' => $validated['check_out_date'],
            'total_price' => $totalPrice,
            'order_number' => 'ORD' . date('YmdHis') . rand(1000, 9999),
            'status' => 'pending',
            'payment_status' => 'unpaid',
        ]);

        return redirect()->route('booking.payment', ['orderId' => $order->id]);
    }

    public function payment($orderId)
    {
        $order = Order::with('room')->findOrFail($orderId);
        
        if ($order->user_id != Auth::id()) {
            abort(403);
        }

        return view('booking.payment', ['order' => $order]);
    }
}
