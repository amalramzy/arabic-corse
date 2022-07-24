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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexCourse(CoursesDataTable $dataTable, $id)
    {
        $track = Track::findOrFail($id);

        return $dataTable->render('backend.courses.index',compact('track'));
    }

    public function index(AllCoursesDataTable $dataTable)
    {
        return $dataTable->render('backend.courses.indexAll');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCourse($id)
    {
        $track = Track::findOrFail($id);
        return view('backend.courses.create',compact('track'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCourse(Request $request, $id)
    {

        $track = Track::findOrFail($id);
        $course = new Course($request->all());
        $course->save();
        return redirect(route('index.courses',$track->id))->with('message', 'Course has been Created Succesfuly');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCourse(Request $request, $id)
    {
        $course = Course::find($id)
        ->where('id',$id)
        ->select('courses.*')
        ->first();
        $course->update($request->all());
    
        return redirect(route('index.courses',$course->track_id))->with('message', 'Course has been updated Succesfuly');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $course = Course::find($id);
        $course->delete();

        return redirect()->back();

    }
}
