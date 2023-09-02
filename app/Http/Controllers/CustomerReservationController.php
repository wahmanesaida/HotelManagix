<?php

namespace App\Http\Controllers;
use App\Mail\ReservationValidationMail;
use App\Mail\ReservationCancellationMail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Reservation;


class CustomerReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Booking_customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_id'=>'required',
            'departure_date'=>'required',
            'release_date'=>'required',
            'room_id'=>'required',
            'total_adults'=>'required',
            'total_children'=>'required',
            'email' => 'required|email',

        ]);
        // Récupérer l'utilisateur connecté
    $user = Auth::user();

    // Recherchez un client correspondant à l'utilisateur connecté
    $client = Client::where('user_id', $user->id)->first();

    $data = new Reservation;
    $data->departure_date = $request->departure_date;
    $data->release_date = $request->release_date;
    $data->room_id = $request->room_id;
    $data->total_adults = $request->total_adults;
    $data->total_children = $request->total_children;
    $data->email = $request->email;

    // Utilisation de la référence pour déterminer l'origine de la réservation
    if ($request->reference == 'customer') {
        // Si la référence est 'customer', utilisez l'ID du client connecté ou créez un client automatiquement
        if ($client) {
            $data->client_id = $client->id;
        } else {
            $newClient = new Client;
            $newClient->user_id = $user->id;
            $newClient->name=$user->name;
            $newClient->email=$user->email;
            $newClient->phone='00';
            $newClient->Address='unknown';
            $newClient->photo='user/inconnu.jpg';
            $newClient->CIN='unknown';
            $newClient->password='unknown';
            $newClient->save();

            $data->client_id = $newClient->id;
        }
    } else {
        // Si la référence est autre que 'customer', utilisez l'ID de client provenant du formulaire de réception
        $data->client_id = $request->client_id;
    }

    $data->save();

    if ($request->reference == 'customer') {
        return redirect('Booking_customer/create')->with('success', 'Booking has been added');
    }

    return redirect('admin/reservation/create')->with('success', 'Booking has been added.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    // availabe rooms
    //function available_rooms(Request $request,$checkin_date){
       // return response()->json($checkin_date);
        //we will request this by ajax
       // $availble=DB::SELECT("SELECT * FROM rooms WHERE id NOT IN (SELECT room_id FROM reservations WHERE '$checkin_date' BETWEEN departure_date AND release_date)");
       // return response()->json(['data'=>$availble]);
   // }

   public function available_roomTypes(Request $request, $checkin_date)
{
    $availableRoomTypes = DB::select("
        SELECT rt.id, rt.title
        FROM room_types rt
        WHERE EXISTS (
            SELECT 1
            FROM rooms r
            WHERE r.room_type_id = rt.id
                AND r.id NOT IN (
                    SELECT room_id
                    FROM reservations
                    WHERE '$checkin_date' BETWEEN departure_date AND release_date
                )
        )
    ");

    return response()->json(['data' => $availableRoomTypes]);
}

    public function available_rooms(Request $request, $checkin_date, $room_type_id)
    {
        $availableRooms = DB::select("
            SELECT r.id, r.title
            FROM rooms r
            WHERE r.room_type_id = $room_type_id
                AND r.id NOT IN (
                    SELECT room_id
                    FROM reservations
                    WHERE '$checkin_date' BETWEEN departure_date AND release_date
                )
        ");

        return response()->json(['data' => $availableRooms]);
    }







    //show reservations list
    function showlist(){
        $reslist=Reservation::all();
        return view('reservation.reservations_list', ['reslist'=>$reslist]);
    }

    public function validateReservation($id)
{
        $reservation = Reservation::with('rooms')->findOrFail($id);

        if ($reservation->rooms->room_status == 'Vacant') {
            // Envoyez un e-mail de validation
            Mail::to($reservation->clients->email)->send(new ReservationValidationMail($reservation));

            // Mettez à jour le statut de la réservation
            $reservation->status = 'validée';
            $reservation->save();
        }

        return redirect()->back()->with('success', 'Réservation validée avec succès.');
}

    public function cancelReservation($id)
    {
        $reservation = Reservation::findOrFail($id);

        // Envoyez un e-mail d'annulation
        Mail::to($reservation->client->email)->send(new ReservationCancellationMail($reservation));

        // Supprimez la réservation
        $reservation->delete();

        return redirect()->back()->with('success', 'Réservation annulée avec succès.');
    }

}
