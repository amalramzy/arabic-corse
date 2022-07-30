@extends('layouts.master')
@section('before-css')


@endsection

@section('main-content')
   <div class="breadcrumb">
    <h3 class="card-title">Course name: {{\Str::limit($course->title,20)}}</h3>

    </div>
    <div class="row">
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
                        
                        <p class="card-text">TRACK NAME: {{$course->track->name}}</p>
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
                      <hr>
                </div>
               
             
    </div>
        <!--add video-->
        
            <hr>
            <h3>courses videos</h3>
            <div>
                <a class="btn btn-icon btn-primary btn-create" href="/admin/courses/{{$course->id}}/videos/create">
                    <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
                    <span class="btn-inner--text">Add Video</span>
                </a>
            </div>
            
            {{-- <iframe class="embed-responsive-item" src="{{$video->link}}?rel=0" allowfullscreen></iframe> --}}
            
        
             
    <div class="row">
               
                @foreach($course->videos as $key => $video)
                <div class="col-sm-4">
                    
                    <img src="{{asset('images\video.jpg')}}">
                </div>
                <div class="col-sm-8">
                    <a href="{{route('videos.show', $video)}}"><h5>{{$video->title}}</h5></a>
                    <form id="delete-form{{$video->id}}" method="POST" action="{{route('videos.destroy',[$video->id])}}" >@csrf
                        {{method_field('DELETE')}}
                    </form> 
                        <a href="#" onclick="if(confirm('Do you want to delete?')){
                            event.preventDefault();
                            document.getElementById('delete-form{{$video->id}}').submit()
                        }else{
                            event.preventDefault();
                        }
                        ">
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </a>
                    <a href="{{route('videos.edit',[$video->id])}}">
                        <button class="btn btn-primary">Edit</button>
                    </a>
                    
                </div>
                @endforeach
    </div>
    <hr>
    <h3>courses Quizzes</h3>
    <div>
        <a class="btn btn-icon btn-primary btn-create" href="/admin/courses/{{$course->id}}/quizzes/create">
            <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
            <span class="btn-inner--text">Add Quiz</span>
        </a>
    </div>
    <div class="row">
                <!--add quiz-->
                @foreach($course->quizzes as $key => $quiz)
                <div class="col-sm-4">
                    
                    <img src="{{asset('images\quiz.png')}}">
                </div>
                <div class="col-sm-8">

                    <a href="{{route('quizzes.show', $quiz)}}"><h5>{{$quiz->name}}</h5></a>
                    <form id="delete-form{{$quiz->id}}" method="POST" action="{{route('quizzes.destroy',[$quiz->id])}}" >@csrf
                        {{method_field('DELETE')}}
                    </form> 
                        <a href="#" onclick="if(confirm('Do you want to delete?')){
                            event.preventDefault();
                            document.getElementById('delete-form{{$quiz->id}}').submit()
                        }else{
                            event.preventDefault();
                        }
                        ">
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </a>
                    <a href="{{route('quizzes.edit',[$quiz->id])}}">
                        <button class="btn btn-primary">Edit</button>
                    </a>
                    
                </div>
                @endforeach
    </div>
       



@endsection

@section('page-js')




@endsection

@section('bottom-js')