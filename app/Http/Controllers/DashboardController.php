<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;
use App\Models\Reservation;
use App\Models\History;

class DashboardController extends Controller
{
    //
    public function index(){
        $client=Client::All();
        $countclient=count($client);
        $maxclient=7;
        $user=User::All();
        $countusers=count($user);
        $maxusers=10;
        $booking=Reservation::All();
        $countBouking=count($booking);
        $maxBouking=20;
        $progressBooking=$countBouking/$maxBouking *100;
        $history=History::all();
        $counthistory=count($history);
        $maxhisory=10;
        $progressHistory=$counthistory/$maxhisory *100;
        return view('/dashboard', ['client'=>$countclient, 'maxclient'=>$maxclient, 'countusers'=>$countusers, 'maxusers'=>$maxusers, 'countBouking'=>$countBouking, 'progressBooking'=>$progressBooking, 'counthistory'=>$counthistory, 'progressHistory'=>$progressHistory]);
    }
}
