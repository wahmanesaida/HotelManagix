<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $user = Auth::user();


    return view('Account.Account', ['user' => $user]);
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $data=User::find($id);
        return view('Account.edit', ['user'=>$data]);
    }


    public function update(Request $request, string $id)
    {
        $data=User::find($id);
        $img=$data->iamge;
        if($img != NULL){
            if($request->hasFile('image')){
                Storage::disk('public')->delete($data->image);
                $path=$request->file('image')->store('user', 'public');
            }
            else{
                $path=$request->prevImg;
            }
        }
       else{
            if($request->hasFile('image')){
                $path=$request->file('image')->store('user', 'public');
            }
            else{
                $path=$request->prevImg;
            }

       }

        $data->image=$path;
        $data->name=$request->name;
        $data->email=$request->email;
        $done=$data->save();
        if($done){
            return redirect('admin/Account')->with('success', 'data has been updated succesfully');
        }else{
            return redirect('admin/Account')->with('error', 'Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
