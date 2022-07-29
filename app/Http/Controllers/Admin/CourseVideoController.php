<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Video;
class CourseVideoController extends Controller
{
    public function create(Course $course)
    {
        return view('backend.courses.createVideo',compact('course'));
    }

    public function store(Request $request,Course $course)
    {
        $video=new Video($request->all());
        $video->save();
        return redirect('/admin/courses/'.$course->id)->with('message', 'Video has been Created Succesfuly');
    }

}
