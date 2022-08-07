<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function index($name){
        $track = Track::where('name', $name)->first();
       
        return view('frontend.track',compact('track'));
     }
}
