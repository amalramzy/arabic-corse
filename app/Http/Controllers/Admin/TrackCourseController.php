<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Track;
use Illuminate\Http\Request;
Use App\Models\Course;
class TrackCourseController extends Controller
{
   
    public function create(Track $track)
    {
        return view('backend.tracks.createCourse',compact('track'));

    }

    public function store(Request $request,Track $track)
    {
        $course = new Course($request->all());
        $course->save();
        
        if ($request->hasFile('image')){
            $course->addMedia($request->file('image'))->toMediaCollection('image');
        }

        return redirect('/admin/tracks/'.$track->id)->with('message', 'Course has been Created Succesfuly');
    }

}
