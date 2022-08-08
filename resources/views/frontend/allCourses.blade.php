@extends('layouts.app')

@section('content')
<div class="container">
  
    <div class="row">
        @foreach($courses as $key => $course)

            <div class="col-sm-3 p-4">
                <div class="courses">
                    @if($course->image)
                    <a href="{{url('auth/course',[$course->slug])}}"><img height="250px" width="250px" src="{{ $course->image}}"></a>
                    @else
                    <a href="{{url('auth/course',[$course->slug])}}"><img height="250px" width="250px" src="/images/courses.jpg"></a>
                    @endif
                    <h5><a href="{{url('auth/course',[$course->slug])}}">{{$course->title}}</a></h5>
                    <span style="margin-left: 10px; font-weight: 500;" class="{{ $course->status == '0' ? 'text-success' : 'text-danger' }}">{{ $course->status == '0' ? 'FREE' : 'PAID' }}</span>
                    <span style="margin-left: 50%">{{ count($course->users) }} users</span>
                </div>
            </div>

        @endforeach
    </div>
    {{-- {{$courses->links()}} --}}
</div>
@endsection