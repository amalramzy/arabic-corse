<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\AdminsDataTable;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Track;
use App\Models\Course;
use App\Models\Quiz;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdminsDataTable $dataTable)
    {
        return $dataTable->render('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAdminRequest $request)
    {
        $admin=new Admin($request->all());
        $admin->password= Hash::make($request->password);
        $admin->save();
        return redirect(route('admins.index'))->with('message', 'Admin has been Created Succesfuly');
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
        $admin = Admin::findOrFail($id);
        return view('admin.edit',compact(['admin']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->update($request->except('password'));
        if($request->password){
            $admin->password= Hash::make($request->password);
            $admin->save();
        }
        return redirect(route('admins.index'))->with('message', 'Admin has been Updated Succesfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::findOrFail($id)->delete();
        return redirect()->route('admins.index')->with('message', 'Admin has been Deleted Succesfuly'); 
    }

    public function upload($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.upload',compact(['admin']));
    }

    public function UploadImage(Request $request,$id)
    {
        $admin = Admin::findOrFail($id);
          if ($request->hasFile('image')){
            $admin->clearMediaCollection('image');
            $admin->addMedia($request->file('image'))->toMediaCollection('image');
        }
        return redirect(route('admins.index'))->with('message', 'upload Image Succesfuly');
    }

    public function adminDashboard()
    {
        $tracks_count = Track::all()->count();
        $courses_count = Course::all()->count();
        $quizzes_count = Quiz::all()->count();
        $users_count = User::all()->count();
        return view('dashboard.dashboardv1',compact('tracks_count','courses_count','quizzes_count','users_count'));
    }

}
