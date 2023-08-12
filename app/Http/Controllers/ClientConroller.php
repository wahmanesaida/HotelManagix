<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Storage;

class ClientConroller extends Controller
{

    public function user(){
        return $this->belongsTo(User::class);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Client::all();
        return view('client.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email|max:255',
            'phone' => 'required|string|max:15|min:10',
            'CIN' => 'required|regex:/^[A-Za-z]{2}[0-9]{4,6}$/|unique:clients,CIN',
            'Address' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'required|string|min:6',
        ]);


        $datatable=new Client;
        $datatable->name=$request->name;
        $datatable->email=$request->email;
        $datatable->phone=$request->phone;
        $datatable->CIN=$request->CIN;
        $datatable->Address=$request->Address;
        $datatable->photo=$request->file('photo')->store('upload', 'public');
        $datatable->password=md5($request->password);
        $datatable->save();
        if ($datatable->wasRecentlyCreated) {
            return redirect('admin/client/create')->with('success', 'Client has been added successfully');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data=Client::find($id);
        return view('client.show', ['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=client::find($id);
        return view('client.edit', ['editdata'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:clients,email,' . $id . ',id',

            'phone' => 'required|string|max:15|min:10',
            'CIN' => 'required|regex:/^[A-Za-z]{2}[0-9]{4,6}$/|unique:clients,CIN,' . $id . ',id',
            'Address' => 'required|string|max:255',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048,' . $id . ',id',

        ]);
        $datatable=Client::find($id);

        if($request->hasFile('photo')){
            Storage::disk('public')->delete($datatable->photo);
            $path=$request->file('photo')->store('upload', 'public');
        }
        else{
            $path=$request->prevImg;
        }


        $datatable->name=$request->name;
        $datatable->email=$request->email;
        $datatable->phone=$request->phone;
        $datatable->CIN=$request->CIN;
        $datatable->Address=$request->Address;
        $datatable->photo=$path;

        $datatable->save();
        if ($datatable) {
            return redirect('admin/client/'.$id.'/edit')->with('success', 'data has been updated successfully');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client=Client::find($id);
        if($client){
            if(!empty($client->photo)){
                Storage::disk('public')->delete($client->photo);
            }
            $client->delete();
            return redirect('admin/client')->with('success', 'data has been deleted');
        }
        else{
            return redirect()->back()->with('error', 'Client not found');
        }

    }
}
