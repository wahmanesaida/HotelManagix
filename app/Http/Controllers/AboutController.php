<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    function about(){
        return view('/about');
    }
    function headerAbout(){
        return view('/about-header');
    }
}
