
    <div class="container">
      <hr>
      <span class="text-center"><h2>My Courses</h2></span>
      <hr>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
       
            <div class="carousel-inner">
                @foreach($user_courses as $key => $course)
              <div class="course carousel-item <?php if($loop->first) echo 'active'; ?>">
                <div class="row">
                    <div class="col-md-6">
                        @if($course->image)
                        <img src="{{$course->image}}">
                        @else
                        <img src="{{asset('/images/download.png')}}">
                        @endif        
                    </div>
                  
                    <div class="col-md-6">
                        <a><h3>{{$course->title}}</h3></a>
                        <a><h4>{{$course->track->name}}</h4></a>
                        <a><h5>{{count($course->users)}} users are learning this course.</h5></a>
                    </div>
        
                </div>
              </div>
             @endforeach
            </div>
            <a class="carousel-control-prev left-arrow" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next right-arrow " href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
          </div>
        
    </div>

