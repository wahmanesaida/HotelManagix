<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Reservation;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

use Stripe\Stripe;



class InvoiceUserController extends Controller
{

    public $totalPrice =0;


     public function index()
     {
         $id=auth()->user()->id;
         $search=DB::select("SELECT id FROM clients WHERE user_id = $id");
         foreach($search as $s){
            $idd=$s->id;
         }
         //dd($idd);
         if(isset($idd)){
            $reservations = Reservation::with('clients')
            ->where('client_id', $idd)
            ->get();
            //dd($reservations);
            return view('invoice_user.index', ['reservations' =>$reservations]);
         }
         else{
            return view('invoice_user.index');
         }

     }



    public function getInfo(Request $request, $client_id){
        $info = DB::select("SELECT id FROM reservations WHERE client_id = $client_id");
        return response()->json(['data' => $info]);
    }





    public function getInvoice(Request $request, $client_id, $reservation_id)
{
    session(['client_id' => $client_id, 'reservation_id' => $reservation_id]);
    $reservation = Reservation::with('rooms', 'rooms.Roomtype')
        ->where('client_id', $client_id)
        ->where('id', $reservation_id)
        ->where('payement_status', 'pending')
        ->get();

    if (!$reservation) {
        return response()->json(['error' => 'Reservation not found'], 404);
    }
    $this->totalPrice = 0;
    foreach ($reservation as $reservationItem) {
        $departureDate = Carbon::parse($reservationItem->departure_date);
        $releaseDate = Carbon::parse($reservationItem->release_date);
        $daysDifference = $departureDate->diffInDays($releaseDate);

        $roomPrice = $reservationItem->rooms->Roomtype->price;
        $this->totalPrice  += $roomPrice * $daysDifference;

    }

    session(['total_price' => $this->totalPrice]);


    return response()->json(['data' => $reservation, 'total_price' => $this->totalPrice]);

}



public function processPayment(Request $request, $client_id, $reservation_id)
{
    $resrv=session('reservation_id');


    Stripe::setApiKey('sk_test_51Nk45JFkFCemfgWuhFnOUHZNfDtErDI2Ro4Vtt99fuUWTK1NDIoSItIl9hTYWYcsYVLSNJ3US10XxScdMs6EDebs00Lzh6jKY3');
    $totalAmount = session('total_price');

    // Créer une session Stripe avec le montant total
    $session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
                'currency' => 'eur',
                'product_data' => [
                    'name' => 'Invoice Payment',
                ],
                'unit_amount' => $totalAmount * 100,
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => route('payment.success'),

        'cancel_url' => route('payment.fail'),
    ]);


    return redirect($session->url);
}






public function paymentSuccess(Request $request)
{

    $reservation_id = session('reservation_id');
    $reservation=Reservation::find($reservation_id);
    //dd($reservation);

    $reservation->payement_status = "paid";
    $reservation->save();

    return redirect('/invoice')->with('success', 'congratulations payment made successfully');
}

public function paymentFail(Request $request)
{

}

    public function successpage(){
        return view('success.index');
    }
}
