<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Quiz;

class CourseQuizController extends Controller
{
  
    public function create(Course $course)
    {
        return view('backend.courses.createQuiz',compact('course'));

    }

   
    public function store(Request $request,Course $course)
    {
        $quiz=new Quiz($request->all());
        $quiz->save();
        return redirect('/admin/courses/'.$course->id)->with('message', 'Quiz has been Created Succesfuly');
    }

}
