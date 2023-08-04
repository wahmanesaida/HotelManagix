<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Roomtype;

class RoomController extends Controller
{
    //
    function room(){
        return view('/rooms');
    }



    public function index()
    {
        $data=Room::all();
        return view('Room.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type=Roomtype::all();
        return view('room.create', ['roomtype'=>$type]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=new Room;
        $data->title=$request->title;
        $data->room_type_id=$request->roomtp_id;
        $data->room_facilities=$request->room_facilities;
        $data->room_rate=$request->room_rate;
        $data->room_status=$request->room_status;
        $data->save();
        return redirect('admin/room/create')->with('success','Data has been added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data=Room::find($id);
        return view('room.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $type=Roomtype::all();
        $data=Room::find($id);
        return view('room.edit',['data'=>$data, 'roomtype'=>$type]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=Room::find($id);
        $data->title=$request->title;
        $data->room_type_id=$request->roomtp_id;
        $data->room_facilities=$request->room_facilities;
        $data->room_rate=$request->room_rate;
        $data->room_status=$request->room_status;
        $data->save();
        if($data->save()){
            return redirect('admin/room/'.$id.'/edit')->with('success', 'Data has been updated successfly');
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Room::where('id', $id)->delete();
        return redirect('admin/room')->with('success', 'data has been deleted successfly');
    }
}

