<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;

class HistoryController extends Controller
{
    function listt(){
        $history=History::all();
        return view('History.History', ['data'=>$history]);
    }
}
