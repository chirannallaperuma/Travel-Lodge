<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomModel extends Model
{
    protected $table = 'rooms';
    protected $fillable = ['room_no', 'room_type', 'price_night', 'max_person','hotel_id','status'];
    const BOOKED = 0;
    const AVAILABLE = 1;

    public function hotel(){
        return $this->belongsTo(HotelModel::class,'hotel_id','id');
    }

    public function bookings(){
        return $this->hasMany(BookingModel::class,'room_id','id');
    }
}
