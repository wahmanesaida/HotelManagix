<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    //
    function about(){
        return view('/about');
    }
    function headerAbout(){
        return view('/about-header');
    }

    public function index()
    {
        $data=About::all();
        return view('About.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('About.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description1' => 'required',
            'description2' => 'required',
            'photo1' => 'required|image',
            'photo2' => 'required|image',
            'photo3' => 'required|image'
        ]);
        $data=new About;
        $data->title=$request->title;
        $data->description1=$request->description1;
        $data->description2=$request->description2;


        if ($request->hasFile('photo1')) {
            $imagePath = $request->file('photo1')->store('About', 'public');
            $data->photo1 = $imagePath;
        }
        if ($request->hasFile('photo2')) {
            $imagePath2 = $request->file('photo2')->store('About', 'public');
            $data->photo2 = $imagePath2;
        }
        if ($request->hasFile('photo3')) {
            $imagePath3 = $request->file('photo3')->store('About', 'public');
            $data->photo3 = $imagePath3;
        }

        $sav=$data->save();
        if($sav){
            return redirect('admin/aboutpage/create')->with('success','Data has been added successfully');
        }




    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data=About::find($id);
        return view('About.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=About::find($id);
        return view('About.edit',['data'=>$data]);
    }


    public function update(Request $request, string $id)
    {
        $data=About::find($id);

        if($request->hasFile('photo1')){
            Storage::disk('public')->delete($data->photo1);
            $path=$request->file('photo1')->store('About', 'public');
        }
        else{
            $path=$request->prevImg;
        }

        if($request->hasFile('photo2')){
            Storage::disk('public')->delete($data->photo2);
            $path2=$request->file('photo2')->store('About', 'public');
        }
        else{
            $path2=$request->prevImg2;
        }

        if($request->hasFile('photo3')){
            Storage::disk('public')->delete($data->photo3);
            $path3=$request->file('photo3')->store('About', 'public');
        }
        else{
            $path3=$request->prevImg3;
        }

        $data->title=$request->title;
        $data->description1=$request->description1;
        $data->description2=$request->description2;
        $data->photo1=$path;
        $data->photo2=$path2;
        $data->photo3=$path3;
        $data->save();
        if($data->save()){
            return redirect('admin/aboutpage/'.$id.'/edit')->with('success', 'Data has been updated successfly');
    }
}

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
       $data=About::find($id);
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
            return redirect('admin/aboutpage')->with('success', 'data has been deleted successfly');
        }
        else{
            return redirect()->back()->with('error', 'User not found.');
        }

    }
}
