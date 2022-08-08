@extends('layouts.app')

@section('content')

    <div class="container rounded bg-white mt-5 mb-5">
        @if (Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
        @endif
        <div class="row ">
                
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    @if($user->avatar)
                    <img class="rounded-circle mt-5" width="150px" src="{{$user->avatar}}">
                    @else
                    <img class="rounded-circle mt-5" width="150px" src="{{asset('/images/149071.png')}}">    
                    @endif
                   
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button" data-toggle="modal" data-target="#show-upload">Upload</button></div>

                    <span class="font-weight-bold">{{$user->name}}</span>
                    <span class="text-black-50">{{$user->email}}</span>
                    <span>{{$user->score}} Points</span></div>
            </div>
            <div class="col-md-5 border-right ">
                <div class="p-3 py-5">
                    <form action="{{route('update.profile')}}" method="POST">
                        @csrf

                    
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Name</label><input name="name" type="text" class="form-control" placeholder="Your Name" value="{{$user->name}}"></div>
                    </div>
                    <div class="row mt-3">
                       <div class="col-md-12"><label class="labels">Email</label><input name="email" type="text" class="form-control" placeholder="Your Email" value="{{$user->email}}"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Password</label><input name="password" type="password" class="form-control" placeholder="Your password" value=""></div>

                     </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience"><span>Tracks</span></div><br>
                    <ul class="list-unstyled">
                        @foreach($user->tracks as $track)

                        <li><a style="width: 100px;" class="btn btn-light" href="{{url('/auth/track',[$track->name])}}">{{ $track->name }}</a></li>

                        @endforeach
                    </ul>
          
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
      <!-- Modal -->
  <div class="modal fade" id="show-upload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Upload Avatar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('upload.avatar')}}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
            <input name="avatar" type="file" class="custom-file-input" id="inputGroupFile02">
            <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose
                        file</label>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-light">Upload</button>
        </div>
        </form>
      </div>
    </div>
  </div>


@endsection