<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
use App\Http\Controllers\Hash;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=User::all();
        return view('users.index', ['users'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email|max:255',
        'role_as' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $newuser = new User;
    $newuser->name = $request->name;
    $newuser->email = $request->email;
    $newuser->password = md5($request->password);; 

    if ($request->role_as == 'Admin') {
        $newuser->role_as = 1;
    } else {
        $newuser->role_as = 0;
    }

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('user', 'public');
        $newuser->image = $imagePath;
    }

    if ($newuser->save()) {
        return redirect('admin/users/create')->with('success', 'User has been added successfully');
    } else {
        return redirect('admin/users/create')->with('error', 'Something went wrong!');
    }
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vb=User::find($id);
        return view('users.show', ['data'=>$vb]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=User::find($id);
        return view('users.edit', ['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|max:255|unique:users,email,' . $id . ',id',
            'role_as' => 'required'
        ]);
        $user=User::find($id);
        if($request->hasFile('image')){
            Storage::disk('public')->delete($user->image);
            $path=$request->file('image')->store('user', 'public');
        }
        else{
            $path=$request->prevImg;
        }

        $user->name=$request->name;
        $user->email=$request->email;
        $user->image=$path;
        if($request->role_as == '1'){
            $user->role_as = 1;
        }
        else{
            $user->role_as = 0;
        }
        $user->save();

        if($user){
            return redirect('admin/users/'.$id.'/edit')->with('success', 'data has been updated successfully');
        }
        else{
            return redirect('admin/users/'.$id.'/edit')->with('error', 'something went wrong');
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $data=User::find($id);
       if (auth()->user()->id == $id) {
        return redirect()->back()->with('error', "You can't delete yourself !!");
    }
        if($data){
            if(!empty($data->image)){
                Storage::disk('public')->delete($data->image);
            }
            $data->delete();
            return redirect('admin/users')->with('success', 'data has been deleted');
        }
        else{
            return redirect()->back()->with('error', 'User not found.');
        }

    }
}
