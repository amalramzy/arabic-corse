<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Track;
use App\Models\Course;
use App\Models\User;class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_courses = User::findOrFail(5)->courses;

		$tracks = Track::with('courses')->orderBy('id', 'desc')->get();

		$famous_tracks_ids = Course::pluck('track_id')->countBy()->sort()->reverse()->keys()->take(10);

		$famous_tracks = Track::withCount('courses')->whereIn('id', $famous_tracks_ids)->orderBy('courses_count', 'desc')->get();
        // dd($famous_tracks);

		$user_courses_ids = User::findOrFail(5)->courses()->pluck('id');

		$user_tracks_ids = User::findOrFail(5)->tracks()->pluck('id');

		$recommended_courses = Course::whereIn('track_id', $user_tracks_ids)->whereNotIn('id', $user_courses_ids)->limit(4)->get();

        return view('frontend.home',compact('user_courses','tracks','famous_tracks','recommended_courses'));
    }
}
