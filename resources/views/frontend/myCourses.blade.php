@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($user_courses as $key => $course)
        
    
    <h2 class="p-3">Course name: {{$course->title}}</h2>
  
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
            <div class="card-body ">

                <p class="card-text">TRACK NAME: {{$course->track->name}}</p>
                <h4 class="{{$course->status == '0' ? 'text-primary': 'text-danger'}}">STATUS: {{$course->status == "0" ? "FREE": "PAID"}}</h4>
                <h5>{{count($course->users)}} users are learning this course.</h5>

              </div>
              <hr>
        </div>
       
     
    </div>
    <h2 class="p-3">All Videos</h2>

    <div class="row text-center videos">
        @foreach($course->videos as $key => $video)
        <div class="col-sm-3 ">
            <div class="courses video">
               
                <img src="{{asset('images\video.jpg')}}">
               
                <a href="{{$video->link}}" data-toggle="modal" data-target="#show-video"><h5>Name Video : {{$video->title}}</h5></a>
               
            </div>
        </div>
        @endforeach
    </div>

   

    <div class="famous-tracks">
                    
        <h2 class="p-3">Quizzes</h2>

        <div class="tracks text-center">
            <ul class="list-unstyled">
            @foreach($course->quizzes as $quiz)

            <li><a @if(in_array($quiz->id , $quiz->users()->pluck('quiz_id')->toArray())) class="btn btn-light"@endif target="_blank" class="btn btn-danger" href="{{url('auth/course/quizzes',[$course->slug,$quiz->name])}}">{{ $quiz->name }}</a></li>

            @endforeach
            </ul>
        </div>

    </div>
    @endforeach
</div>
@endsection