<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportUser;
use App\Exports\ExportUser;
use App\Models\User;
use App\DataTables\UsersDataTable;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $users = User::where('email' ,'amal775@gmail.com')->get('email')->first();
        //  $users2 = User::where('email' ,'amal57676@gmail.com')->get('email')->count();
       
        // dd($users,$users2);
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=new User($request->all());
        $user->password= Hash::make($request->password);
        $user->save();
        return redirect(route('users.index'))->with('message', 'User has been Created Succesfuly');
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
        $user = User::findOrFail($id);
        return view('user.edit',compact(['user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
       
        return redirect(route('users.index'))->with('message', 'User has been Updated Succesfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('users.index')->with('message', 'User has been Deleted Succesfuly');
    }

    public function importView(Request $request){
        return view('user.importFile');
    }

    public function import(Request $request){
        if ($request->file('file') != null) {
            // dd($request);
            Excel::import(new ImportUser, $request->file('file')->store('files'));
            return redirect()->back()->with('message', 'The file has been added successfully');
        }
        return redirect()->back()->with('message', 'Please select your file ');
    }

    public function exportUsers(Request $request){
        return Excel::download(new ExportUser, 'users.xlsx');
    }

    public function upload($id)
    {
        $user = User::findOrFail($id);
        return view('user.upload',compact(['user']));
    }

    public function UploadAvatar(Request $request,$id)
    {
        $user = User::findOrFail($id);
          if ($request->hasFile('avatar')){
            $user->clearMediaCollection('avatar');
            $user->addMedia($request->file('avatar'))->toMediaCollection('avatar');
        }
        return redirect(route('users.index'))->with('message', 'upload avatar Succesfuly');
    }

}
