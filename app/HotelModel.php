<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelModel extends Model
{
    protected $table = 'hotels';
    protected $fillable = ['hotel_name', 'hotel_email', 'description', 'hotel_rooms',
        'ac', 'pool', 'wifi', 'gym', 'img_url','city','address'];

    public function rooms(){
        return $this->hasMany(RoomModel::class,'hotel_id','id');
    }
}
