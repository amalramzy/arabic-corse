<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
class CourseController extends Controller
{
    public function index($slug){
       $course = Course::where('slug', $slug)->first();
      
       return view('frontend.course',compact('course'));
    }
}
