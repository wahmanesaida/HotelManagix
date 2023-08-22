<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public function rooms()
{
        return $this->belongsTo(Room::class, 'room_id');
}
    public function clients(){
        return $this->belongsTo(Client::class, 'client_id');
    }



}
