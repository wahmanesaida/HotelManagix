<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $table = 'histories';

    protected $fillable = [
        'reservation_id',
        'room_type',
        'room',
        'email',
        'CIN',
        'checkin_date',
        'checkout_date',
        'payment_status',
    ];

    public function ReservationHistory(){
        return $this->belongsTo(Reservation::class);
    }
}
