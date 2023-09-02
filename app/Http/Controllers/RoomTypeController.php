<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roomtype;
use Illuminate\Support\Facades\Storage;

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
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'photo1' => 'required',
            'photo2' => 'required',
            'photo3' => 'required'
        ]);
        $data=new Roomtype;
        $data->title=$request->title;
        $data->description=$request->description;
        $data->price=$request->price;


        if ($request->hasFile('photo1')) {
            $imagePath = $request->file('photo1')->store('Roomtype', 'public');
            $data->photo1 = $imagePath;
        }
        if ($request->hasFile('photo2')) {
            $imagePath2 = $request->file('photo2')->store('Roomtype', 'public');
            $data->photo2 = $imagePath2;
        }
        if ($request->hasFile('photo3')) {
            $imagePath3 = $request->file('photo3')->store('Roomtype', 'public');
            $data->photo3 = $imagePath3;
        }

        $sav=$data->save();
        if($sav){
            return redirect('admin/roomtype/create')->with('success','Data has been added successfully');
        }




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


    public function update(Request $request, string $id)
    {
        $data=Roomtype::find($id);

        if($request->hasFile('photo1')){
            Storage::disk('public')->delete($data->photo1);
            $path=$request->file('photo1')->store('Roomtype', 'public');
        }
        else{
            $path=$request->prevImg;
        }

        if($request->hasFile('photo2')){
            Storage::disk('public')->delete($data->photo2);
            $path2=$request->file('photo2')->store('Roomtype', 'public');
        }
        else{
            $path2=$request->prevImg2;
        }

        if($request->hasFile('photo3')){
            Storage::disk('public')->delete($data->photo3);
            $path3=$request->file('photo3')->store('Roomtype', 'public');
        }
        else{
            $path3=$request->prevImg3;
        }

        $data->title=$request->title;
        $data->description=$request->description;
        $data->price=$request->price;
        $data->photo1=$path;
        $data->photo2=$path2;
        $data->photo3=$path3;
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
       $data=Roomtype::find($id);
        if($data){
            if(!empty($data->photo1)){
                Storage::disk('public')->delete($data->photo1);
            }

            if(!empty($data->photo2)){
                Storage::disk('public')->delete($data->photo2);
            }
            if(!empty($data->photo3)){
                Storage::disk('public')->delete($data->photo3);
            }
            $data->delete();
            return redirect('admin/roomtype')->with('success', 'data has been deleted successfly');
        }
        else{
            return redirect()->back()->with('error', 'User not found.');
        }

    }
}
