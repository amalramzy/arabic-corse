@extends('layouts.master')
@section('before-css')


@endsection

@section('main-content')
   <div class="breadcrumb">
    <div class="text-left p-3">
        <h3>Track name: {{\Str::limit($track->name,20)}}</h3>
        <a class="btn btn-icon btn-primary btn-create" href="/admin/tracks/{{$track->id}}/courses/create">
            <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
            <span class="btn-inner--text">Add Course</span>
        </a>
    </div>
    
    </div>
            <div class="row">
              
                @foreach($track->courses as $key => $course)
                <div class="col-sm-4">
                    
                    <div class="card" style="width: 20rem;">
                        @if($course->image)
                        <img src="{{$course->image}}" class="card-img-top" alt="...">
                        @else
                        <img src="{{asset('/images/download.png')}}" class="card-img-top" alt="...">

                        @endif
                       
                      </div>
                  
                </div>
                <div class="col-sm-8">
                    <div class="card-body">
                       
                            
                        
                        <p class="card-text">COURSES NAME: {{$course->title}}</p>
                        <h4 class="{{$course->status == '0' ? 'text-primary': 'text-danger'}}">STATUS: {{$course->status == "0" ? "FREE": "PAID"}}</h4>
                        <form id="delete-form{{$course->id}}" method="POST" action="{{route('courses.destroy',[$course->id])}}" >@csrf
                            {{method_field('DELETE')}}
                           </form> 
                            <a href="#" onclick="if(confirm('Do you want to delete?')){
                                event.preventDefault();
                                document.getElementById('delete-form{{$course->id}}').submit()
                            }else{
                                event.preventDefault();
                            }
                            ">
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </a>
                        <a href="{{route('edit.courses',[$course->id, $course->track_id])}}">
                            <button class="btn btn-primary">Edit</button>
                        </a>
                      </div>
                      
                    
                </div>
                <hr>
                @endforeach
            </div>
        
        


@endsection

@section('page-js')




@endsection

@section('bottom-js')