@extends('layouts.app')

@section('content')
   <div class="container">
    <h2 class="p-3">Track name: {{$track->name}}</h2>

   <div class="track-container">
  @foreach($track->courses as $key => $course)
  <a href="{{url('auth/course',[$course->slug])}}"><h2 class="p-3">Course name: {{$course->title}}</h2></a>
   
  <div class="row">
      <div class="col-sm-4">
          
          <div class="card" style="width: 20rem;">
              @if($course->image)
              <a href="{{url('auth/course',[$course->slug])}}"><img height="250px" width="250px" src="{{$course->image}}" class="card-img-top" alt="..."></a>
              @else
              <a href="{{url('auth/course',[$course->slug])}}"><img height="250px" width="250px" src="{{asset('/images/download.png')}}" class="card-img-top" alt="..."></a>

              @endif
             
            </div>
        
      </div>
      <div class="col-sm-8">
          <div class="card-body ">

              <a href=""><p class="card-text">TRACK NAME: {{$course->track->name}}</p></a>
              <h4 class="{{$course->status == '0' ? 'text-primary': 'text-danger'}}">STATUS: {{$course->status == "0" ? "FREE": "PAID"}}</h4>
              <h5>{{count($course->users)}} users are learning this course.</h5>
              <span>users enrolled</span>
              @if(count(auth()->user()->courses()->where('slug',$course->slug)->get()) > 0)
               <div class="alert alert-success">Already Enrolled</div>
              @else
              <form method="POST" action="{{url('auth/course',$course->slug)}}">
                @csrf
                <input type="submit" value="Enroll" name="enroll" class="btn btn-light">
              </form>
              @endif
            </div>
            <hr>
      </div>
     
   
  </div>
  @endforeach
    
   </div>
   </div>
@endsection