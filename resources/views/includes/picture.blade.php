<div class="home_picture">
	

	<div class="container-fluid">
		
		<div class="background_text">
			
			<p class="text-center">Start learning over <span class="number">{{ \App\Models\Course::where('status','0')->count() }}</span> courses for <strong>Free</strong>.</p>
			<p class="text-center">More than <span>{{ \App\Models\User::all()->count() }}</span> users have enrolled in <span>{{ \App\Models\Course::all()->count() }}</span> courses in <span>{{ \App\Models\Track::all()->count() }}</span> different Tracks</p>
			<div class="actions">
				<a class="btn btn-light" href="{{ route('register') }}">Start Learning</a>
				@auth
				<a class="btn" href="#">My Courses</a>
				@endauth
			</div>
		</div>

	</div>


</div>