<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    //
    function restaurant(){
        return view('/restaurant');
    }
}
