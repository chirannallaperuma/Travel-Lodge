<?php

namespace App\Http\Controllers;

use App\BookingModel;
use App\PaymentModel;
use App\RoomModel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{

    //function for make payment and book a room
    public function makePayment(Request $request)
    {

        $request->validate([
            'check_in' => ['required'],
            'check_out' => ['required'],
            'card_name' => ['required', 'string', 'max:255'],
            'card_number' => ['required', 'numeric', 'digits:16'],
            'cvv' => ['required', 'digits:3', 'numeric'],
            'expiry' => ['required'],
            'amount' => ['required', 'regex:/^\d*(\.\d{2})?$/']
        ]);

        $booking = BookingModel::create([
            'room_id' => $request->room_id,
            'user_id' => Auth::user()->id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
        ]);

        $payment = PaymentModel::create([
            'user_id' => Auth::user()->id,
            'booking_id' => $booking->id,
            'card_name' => $request->card_name,
            'card_number' => $request->card_number,
            'cvv' => $request->cvv,
            'expiry' => $request->expiry,
            'amount' => $request->amount,
        ]);

        $room = RoomModel::findOrFail($request->room_id);

        $room->update([
            'status' => RoomModel::BOOKED
        ]);

        return redirect()->route('booking.list');
    }


    //function for view my bookings for customer
    public function bookingList()
    {
        $user = User::find(Auth::user()->id);
        return view('booking.booking_list', compact('user'));
    }
}
