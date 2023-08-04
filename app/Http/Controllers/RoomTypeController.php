<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roomtype;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function roomdetails(){
        return view('/room-details');
    }

    public function index()
    {
        $data=Roomtype::all();
        return view('RoomType.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roomtype.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=new Roomtype;
        $data->title=$request->title;
        $data->description=$request->description;
        $data->save();
        return redirect('admin/roomtype/create')->with('success','Data has been added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data=Roomtype::find($id);
        return view('roomtype.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=Roomtype::find($id);
        return view('roomtype.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=Roomtype::find($id);
        $data->title=$request->title;
        $data->description=$request->description;
        $data->save();
        if($data->save()){
            return redirect('admin/roomtype/'.$id.'/edit')->with('success', 'Data has been updated successfly');
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Roomtype::where('id', $id)->delete();
        return redirect('admin/roomtype')->with('success', 'data has been deleted successfly');
    }
}
