<div class="container">

	<div class="famous-courses">
        <?php $i = 0; ?>
        @foreach($tracks as $key => $track)
        
       
        <h2>Last {{$track->name}} Courses</h2>

		<div class="row">
            @foreach($track->courses()->limit(4)->get() as $key => $course)

            <div class="col-sm-3">
                <div class="courses">
                    @if($course->image)
					<a href="{{url('auth/course',[$course->slug])}}"><img src="{{ $course->image}}"></a>
					@else
					<a href="{{url('auth/course',[$course->slug])}}"><img src="/images/courses.jpg"></a>
					@endif
                    <h5><a href="{{url('auth/course',[$course->slug])}}">{{$course->title}}</a></h5>
                    <span style="margin-left: 10px; font-weight: 500;" class="{{ $course->status == '0' ? 'text-success' : 'text-danger' }}">{{ $course->status == '0' ? 'FREE' : 'PAID' }}</span>
					<span style="margin-left: 50%">{{ count($course->users) }} users</span>
                </div>
            </div>

            @endforeach

            @if($i == 1)
                <div class="famous-tracks">
                    
                    <h2>Famous topic for you</h2>

                    <div class="tracks text-center">
                        <ul class="list-unstyled">
                        @foreach($famous_tracks as $famous_track)

                        <li><a class="btn btn-light" href="#">{{ $famous_track->name }}</a></li>

                        @endforeach
                        </ul>
                    </div>

                </div>
            @endif

            @if($i == 2) 

                <div class="recommended-courses">
                    
                    <h2>Recommended courses for you </h2>

                    {{-- <div class="courses"> --}}

                        @foreach($recommended_courses as $course)
                            <div class="courses">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="course-image">
                                            @if($course->image)
                                            <a href="{{url('auth/course',[$course->slug])}}"><img src="{{ $course->image }}"></a>
                                            @else
                                            <a href="{{url('auth/course',[$course->slug])}}"><img src="/images/courses.jpg"></a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="course-details">
                                            <h5><a href="{{url('auth/course',[$course->slug])}}">{{$course->title}}</a></h5>
                                            <span style="margin-left: 10px; font-weight: 500;" class="{{ $course->status == '0' ? 'text-success' : 'text-danger' }}">{{ $course->status == '0' ? 'FREE' : 'PAID' }}</span>
                                            <span style="margin-left: 15%">{{ count($course->users) }} users</span>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        @endforeach

                    {{-- </div> --}}

                </div>

		    @endif
           
            
        </div>
        <?php $i++; ?>
        @endforeach
	</div>
</div>
