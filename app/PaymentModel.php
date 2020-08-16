<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentModel extends Model
{
    protected $table = 'payments';
    protected $fillable = ['user_id', 'booking_id', 'card_name', 'card_number', 'cvv', 'expiry', 'amount'];
}
