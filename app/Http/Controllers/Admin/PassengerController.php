<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\TravelSchedules;
use App\PaymentStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PassengerController extends Controller
{
    public function index()
    {
        $bookings = auth()->user()->bookings()->with('travelSchedule')->get();
        return view('passenger.bookings.index', compact('bookings'));
    }

    public function create($travelId)
    {
        $travel = TravelSchedules::findOrFail($travelId);
        return view('passenger.bookings.create', compact('travel'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'travel_schedule_id' => 'required|exists:travel_schedules,id',
            'ticket_quantity' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($request) {

            $travel = TravelSchedules::lockForUpdate()->findOrFail($request->travel_schedule_id);


            $totalBooked = $travel->bookings()->sum('ticket_quantity');


            $remainingSeats = $travel->passenger_quota - $totalBooked;


            if ($request->ticket_quantity > $remainingSeats) {
                abort(400, 'Not enough quota available.');
            }


            Booking::create([
                'user_id' => auth()->id(),
                'travel_schedule_id' => $travel->id,
                'ticket_quantity' => $request->ticket_quantity,
                'payment_status' => PaymentStatus::PENDING,
            ]);
        });

        return redirect()
            ->route('bookings.index')
            ->with('success', 'Booking created. Please proceed to payment.');
    }
}
