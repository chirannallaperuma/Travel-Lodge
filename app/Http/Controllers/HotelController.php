<?php

namespace App\Http\Controllers;

use App\BookingModel;
use App\HotelModel;
use App\RoomModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelController extends Controller
{
    public function __construct(RoomModel $roomModel)
    {
        $this->roomModel = $roomModel;
    }

    //function for view of create new room
    public function newRoom()
    {
        return view('hotel.new_room');
    }


    //function for create new room
    public function createRoom(Request $request)
    {

        $request->validate([
            'room_no' => ['required', 'numeric'],
            'room_type' => ['required', 'string', 'max:255'],
            'price_night' => ['required', 'regex:/^\d*(\.\d{2})?$/'],
            'max_person' => ['required', 'numeric']
        ]);

        $this->roomModel->create([
            'room_no' => $request->room_no,
            'room_type' => $request->room_type,
            'price_night' => $request->price_night,
            'max_person' => $request->max_person,
            'hotel_id' => Auth::user()->hotel_id,
            'status' => RoomModel::AVAILABLE,
        ]);

        return redirect()->back()->with('alert', 'room successfully created');
    }

    //function for room list
    public function roomList()
    {
        $rooms = RoomModel::where('hotel_id', Auth::user()->hotel_id)->paginate(10);
        return view('hotel.room_list', compact('rooms'));
    }

    //function for booking list
    public function bookings()
    {
        $hotel = HotelModel::with('rooms')->find(Auth::user()->hotel_id);
        return view('hotel.booking_list', compact('hotel'));
    }

    //function for payment list
    public function payments()
    {
        $hotel = HotelModel::with('rooms')->find(Auth::user()->hotel_id);
        return view('hotel.payment_list', compact('hotel'));
    }

    //function for make a reservation
    public function searchHotel(Request $request)
    {
        $search = $request->search;
        $check_in = $request->check_in;
        $check_out = $request->check_out;

        if ($search != null) {
            $hotels = HotelModel::where('address', 'LIKE', "%{$search}%")
                ->orWhere('city', 'LIKE', "%{$search}%")->paginate(10);

            return view('booking.hotels', compact('hotels', 'check_in', 'check_out'));
        }
    }

    //function for search hotels using checkin and checkout dates
    public function rooms($hotel_id, $check_in, $check_out)
    {
        $booked_rooms = BookingModel::whereBetween('check_in', [$check_in, $check_out])
            ->orWhereBetween('check_out', [$check_in, $check_out])
            ->pluck('room_id');

        $rooms = RoomModel::where('hotel_id', $hotel_id)
            ->whereNotIn('id', $booked_rooms)
            ->paginate(8);
        return view('booking.room_booking', compact('rooms'));
    }

    //function for view of room
    public function viewRoom($room)
    {
        $room = RoomModel::findOrFail($room);
        return view('booking.reserve', compact('room'));
    }

    //function for delete a room
    public function deleteRoom($room)
    {
        $delete = RoomModel::where('id', $room)->delete();

        if ($delete == 1) {
            $success = true;
            $message = "Room Successfully deleted";
        } else {
            $success = true;
            $message = "Room not found";
        }

        return response()->json([
            'success' => $success,
            'message' => $message
        ]);

        return redirect()->to('/hotel/room_list');
    }

    //function for edit hotel details
    public function viewHotel()
    {
        $hotel = HotelModel::find(Auth::user()->hotel_id);
        return view('hotel.hotel_edit', compact('hotel'));
    }

    //function for update hotel details
    public function updateHotel(Request $request)
    {
        $detail = HotelModel::find(Auth::user()->hotel_id);

        $detail->update([
            'description' => $request->description,
            'ac' => isset($request->ac) == 'ac' ? 1 : null,
            'pool' => isset($request->pool) == 'pool' ? 1 : null,
            'wifi' => isset($request->wifi) == 'wifi' ? 1 : null,
            'gym' => isset($request->gym) == 'gym' ? 1 : null,
        ]);


        return redirect()->back()->with('alert', 'successfully updated');
    }

}
