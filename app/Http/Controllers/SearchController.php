<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class SearchController extends Controller
{
    public function index( Request $request){
        // dd($request->all());
        $q = $request->q;
        $courses = Course::where('title','LIKE',"%{$q}%")->get();

        // dd($courses);
        return view('frontend.search',compact('courses'));
    }
}
