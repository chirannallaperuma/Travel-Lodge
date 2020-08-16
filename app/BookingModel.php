<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    protected $table = 'bookings';
    protected $fillable = ['room_id','user_id','check_in','check_out'];

    public function rooms(){
        return $this->hasOne(RoomModel::class,'id','room_id');
    }

    public function payment(){
        return $this->belongsTo(PaymentModel::class,'id','booking_id');
    }

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
