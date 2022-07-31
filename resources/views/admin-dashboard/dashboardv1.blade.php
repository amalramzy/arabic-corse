<?php
use App\Models\Track;
use App\Models\Course;
use App\Models\Quiz;
use App\Models\User;

        $tracks = Track::orderBy('id','desc')->limit(5)->get();
        $courses = Course::orderBy('id','desc')->limit(5)->get();
        $quizzes = Quiz::orderBy('id','desc')->limit(5)->get();
        $users = User::orderBy('id','desc')->limit(5)->get();
?>
@extends('layouts.master')
@section('main-content')
           <div class="breadcrumb">
                <h1>Version 1</h1>
                <ul>
                    <li><a href="">Dashboard</a></li>
                    <li>Version 1</li>
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>

            <div class="row">
                <!-- ICON BG -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Add-User"></i>
                            <div class="content">
                                <p class="text-muted mt-2 mb-0">Users</p>
                                <p class="text-primary text-24 line-height-1 mb-2"><a href="{{route('users.index')}}">{{$users_count}}</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Paper-Plane"></i>
                            <div class="content">
                                <p class="text-muted mt-2 mb-0">Tracks</p>
                                <p class="text-primary text-24 line-height-1 mb-2"><a href="{{route('tracks.index')}}">{{$tracks_count}}</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Add-File"></i>
                            <div class="content">
                                <p class="text-muted mt-2 mb-0">Quizzes</p>
                                <p class="text-primary text-24 line-height-1 mb-2"><a href="{{route('quizzes.index')}}">{{$quizzes_count}}</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Arrow-Down"></i>
                            <div class="content">
                                <p class="text-muted mt-2 mb-0">Courses</p>
                                <p class="text-primary text-24 line-height-1 mb-2"><a href="{{route('courses.index')}}">{{$courses_count}}</a></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

           

            <div class="row">
                <div class="col-md-12">

                  
                    {{-- <div class="row">
                        <div class="col-md-12"> --}}
                            <div class="card o-hidden mb-4">
                                <div class="card-header d-flex align-items-center border-0">
                                    <h3 class="w-50 float-left card-title m-0">New Users</h3>
                                    <div class="dropdown dropleft text-right w-50 float-right">
                                        <button class="btn bg-gray-100" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="nav-icon i-Gear-2"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <a class="dropdown-item" href="{{route('users.create')}}">Add new user</a>
                                            <a class="dropdown-item" href="{{route('users.index')}}">View All users</a>
                                            >
                                        </div>
                                    </div>
                                </div>

                                <div class="">
                                    <div class="table-responsive">
                                        <table id="user_table" class="table  text-center">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Avatar</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Score</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            @foreach($users as $key => $user)
                                                
                                            
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>{{$user->name}}</td>
                                                    <td>

                                                        <img class="rounded-circle m-0 avatar-sm-table " src="{{$user->avatar}}" alt="">

                                                    </td>

                                                    <td>{{$user->email}}</td>
                                                    <td><span class="badge badge-success">{{$user->score}}</span></td>
                                                    <td>
                                                        <a href="{{route('users.edit',[$user->id])}}" class="text-success mr-2">
                                                            <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                        </a>
                                                        <form id="delete-form{{$user->id}}" method="POST" action="{{route('users.destroy',[$user->id])}}" >@csrf
                                                            {{method_field('DELETE')}}
                                                        </form> 
                                                        <a href="#" onclick="if(confirm('Do you want to delete?')){
                                                            event.preventDefault();
                                                            document.getElementById('delete-form{{$user->id}}').submit()
                                                        }else{
                                                            event.preventDefault();
                                                        }
                                                        " class="text-danger mr-2">
                                                            <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                                    
                                               
                                            </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>


                        {{-- </div>
                    </div> --}}

                </div>
            </div>
            <div class="row">
                <div class="col-md-6">

                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title">New Courses</div>
                            @foreach($courses as $key => $course)
                                
                            <div class="d-flex flex-column flex-sm-row align-items-center mb-3">
                                <img class="avatar-lg mb-3 mb-sm-0 rounded mr-sm-3" src="{{$course->image}}" alt="">
                                <div class="flex-grow-1">
                                    <h5 class=""><a href="">{{$course->title}}</a></h5>
                                    {{-- <p class="m-0 text-small text-muted">{{Str::limit($course->link,50)}}</p> --}}
                                    <p class="text-small text-danger m-0">{{$course->status == "0" ? "FREE": "PAID"}}</p>
                                </div>
                                <div>
                                    <button class="btn btn-outline-primary btn-rounded btn-sm"><a href="{{route('courses.show',[$course->id])}}">View details</a></button>
                                </div>
                            </div>
                            @endforeach

                            
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body p-0">
                            <div class="card-title border-bottom d-flex align-items-center m-0 p-3">
                                <span>Tracks</span>
                                <span class="flex-grow-1"></span>
                                {{-- <span class="badge badge-pill badge-warning">Updated daily</span> --}}
                            </div>
                            @foreach($tracks as $key => $track)
                                
                            
                            <div class="d-flex border-bottom justify-content-between p-3">
                                <div class="flex-grow-1">
                                    <span class="text-small text-muted">Name</span>
                                    <h5 class="m-0"><a href="{{route('tracks.show',[$track->id])}}">{{$track->name}}</a></h5>
                                </div>
                              
                                <div class="flex-grow-1">
                                    <span class="text-small text-muted">courses</span>
                                    <h5 class="m-0">{{$track->courses->count()}}</h5>
                                </div>
                            </div>
                           
                            @endforeach

                        </div>
                    </div>

                </div>

                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body p-0">
                            <h5 class="card-title m-0 p-3">Last 20 Day Leads</h5>
                            <div id="echart3" style="height: 360px;"></div>
                        </div>
                    </div>
                </div>

            </div>


@endsection

@section('page-js')
     <script src="{{asset('assets/js/vendor/echarts.min.js')}}"></script>
     <script src="{{asset('assets/js/es5/echart.options.min.js')}}"></script>
     <script src="{{asset('assets/js/es5/dashboard.v1.script.js')}}"></script>

@endsection
