@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="p-3" ><?php echo count($courses);?> Courses Match</h2>
    @foreach($courses as $key => $course)
    <a href="{{url('auth/course',[$course->slug])}}"><h2 class="p-3">Course name: {{$course->title}}</h2></a>
   
    <div class="row">
        <div class="col-sm-4">
            
            <div class="card" style="width: 20rem;">
                @if($course->image)
                <a href="{{url('auth/course',[$course->slug])}}"><img src="{{$course->image}}" class="card-img-top" alt="..."></a>
                @else
                <a href="{{url('auth/course',[$course->slug])}}"><img src="{{asset('/images/download.png')}}" class="card-img-top" alt="..."></a>

                @endif
               
              </div>
          
        </div>
        <div class="col-sm-8">
            <div class="card-body ">

                <a href=""><p class="card-text">TRACK NAME: {{$course->track->name}}</p></a>
                <h4 class="{{$course->status == '0' ? 'text-primary': 'text-danger'}}">STATUS: {{$course->status == "0" ? "FREE": "PAID"}}</h4>
                <h5>{{count($course->users)}} users are learning this course.</h5>

              </div>
              <hr>
        </div>
       
     
    </div>
    @endforeach
   
    
</div>


@endsection