<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    function reservations(){
        return $this->hasMany(Reservation::class); //un client peut effectuer plusieur reservation
    }
}
