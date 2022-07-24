<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TracksDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Track;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\TrackRequest;
use App\Models\Course;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TracksDataTable $dataTable)
    {
      
        return $dataTable->render('backend.tracks.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.tracks.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrackRequest $request)
    {
        $track=new Track($request->all());
        $track->save();
        return redirect(route('tracks.index'))->with('message', 'Track has been Created Succesfuly');
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
    public function edit($id)
    {
        $track = Track::findOrFail($id);
        return view('backend.tracks.edit',compact(['track']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TrackRequest $request, $id)
    {
        $track = Track::findOrFail($id);
        $track->update($request->all());
       
        return redirect(route('tracks.index'))->with('message', 'Track has been Updated Succesfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Track::findOrFail($id)->delete();
        return redirect()->route('tracks.index')->with('message', 'Track has been Deleted Succesfuly');
    }
}
