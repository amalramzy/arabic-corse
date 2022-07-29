<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AllCoursesDataTable;
use App\DataTables\CoursesDataTable;
use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Track;
use App\Http\Requests\CourseRequest;

class CourseController extends Controller
{
    //all courses
    public function index(AllCoursesDataTable $dataTable)
    {
        return $dataTable->render('backend.courses.indexAll');
    }

    public function create()
    {
        return view('backend.courses.createCourse');
    }

    public function store(CourseRequest $request ,Track $track)
    {
        $course = new Course($request->all());
        $course->save();
        
        if ($request->hasFile('image')){
            $course->addMedia($request->file('image'))->toMediaCollection('image');
        }

        return redirect(url('/admin/tracks/',$track->id))->with('message', 'Course has been Created Succesfuly');
    }

    //courses Track
    public function indexCourse(CoursesDataTable $dataTable, $id)
    {
        $track = Track::findOrFail($id);
        return $dataTable->render('backend.courses.index',compact('track'));
    }

    public function createCourse($id)
    {
        $track = Track::findOrFail($id);
        return view('backend.courses.create',compact('track'));
    }

    public function storeCourse(CourseRequest $request, $id)
    {
        $track = Track::findOrFail($id);
        $course = new Course($request->all());
        $course->save();
        if ($request->hasFile('image')){
            $course->addMedia($request->file('image'))->toMediaCollection('image');
        }
        return redirect(route('index.courses',$track->id))->with('message', 'Course has been Created Succesfuly');
    }

    public function show(Course $course)
    {
        return view('backend.courses.show', compact('course'));
    }

    public function editCourse($id, $track_id)
    {
        $course = Course::find($id)
        ->where('id',$id)
        ->select('courses.*')
        ->first();
        // dd($course);
        $track = Track::find($track_id)
        ->where('id',$track_id)
        ->select('tracks.*')
        ->first();
        return view('backend.courses.edit',compact(['course','track']));
    }

    public function updateCourse(Request $request, $id)
    {
        $course = Course::find($id)
        ->where('id',$id)
        ->select('courses.*')
        ->first();
        $course->update($request->all());
        return redirect(route('index.courses',$course->track_id))->with('message', 'Course has been updated Succesfuly');
    }

    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();
        return redirect()->back();
    }
}
