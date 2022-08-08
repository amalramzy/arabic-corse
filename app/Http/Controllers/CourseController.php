<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
class CourseController extends Controller
{
    public function index($slug){
       $course = Course::where('slug', $slug)->first();
      
       return view('frontend.course',compact('course'));
    }

    public function myCourses(){
            $user = auth()->user();
            $user_courses = $user->courses;

        return view('frontend.myCourses',compact('user_courses')); 
    }

    public function enroll($slug){
        $course = Course::where('slug', $slug)->first();
        $user = auth()->user();
        $track = $course->track;
        $user->tracks()->attach([$track->id]);
        $user->courses()->attach([$course->id]);
        return redirect('/auth/course/'. $slug . '')->with('message', "You've Enrolled in ". $course->title);

    }

    public function allCourses(){
      $courses = Course::paginate(16);

    return view('frontend.allCourses',compact('courses')); 
}
}
