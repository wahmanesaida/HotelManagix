<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\History;

class CheckController extends Controller
{
    function checkin(){
        $data=Reservation::all();
        return view('CheckProcesses.checkin', ['data'=>$data]);
    }





    public function processCheckin($id)
    {
        $varble = Reservation::find($id);

        if ($varble->status == 'validated' && $varble->checkin == 'unchecked') {

            $varble->rooms->room_status = 'occupied';
            $varble->rooms->save();
            $varble->checkin = 'checked';


            $varble->checkin_date = now();

            $varble->save();
            return redirect('admin/checkin')->with('success', 'Check-in completed successfuly.');
        }
        return redirect('admin/checkin')->with('error', 'This reservation has not been validated for check-in.');


    }

    function checkout(){
        $data=Reservation::all();
        return view('CheckProcesses.Checkout', ['out'=>$data]);
    }


    public function processCheckout($id)
{
    $reservation = Reservation::findOrFail($id);


    if ($reservation->status == 'validated' && $reservation->checkin == 'checked' && $reservation->checkout == 'unchecked' && $reservation->payement_status == 'paid') {

        $reservation->rooms->room_status = 'available';
        $reservation->rooms->save();

        $reservation->checkout = 'checked';
        $reservation->checkout_date = now();

        $reservation->save();

        History::create([
            'reservation_id' => $reservation->id,
            'room_type'=>$reservation->rooms->Roomtype->title,
            'room'=>$reservation->rooms->title,
            'email' => $reservation->email,
            'CIN' => $reservation->clients->CIN,
            'checkin_date' => $reservation->checkin_date,
            'checkout_date' => now(),
            'payment_status' => $reservation->payement_status,
        ]);
        $reservation->delete();
        

        return redirect('admin/checkout')->with('success', 'Checkout completed successfully.');


    }

    if($reservation->payement_status == 'pending'){
        $errortype='Payment has not been completed !';
        return redirect('admin/checkout')->with(['error' => 'Unable to check out for this booking.', 'errortype'=>$errortype]);
    }



}


}
