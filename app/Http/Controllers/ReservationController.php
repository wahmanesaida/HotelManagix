<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Reservation;

class ReservationController extends Controller
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
        $clients=Client::all();
        return view('reservation.create', ['data'=>$clients]);
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

        ]);



        $data=new Reservation;
        $data->client_id=$request->client_id;
        $data->departure_date=$request->departure_date;
        $data->release_date=$request->release_date;
        $data->room_id=$request->room_id;
        $data->total_adults=$request->total_adults;
        $data->total_children=$request->total_children;
        $data->save();

        return redirect('admin/reservation/create')->with('success','Data has been added.');
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
}
