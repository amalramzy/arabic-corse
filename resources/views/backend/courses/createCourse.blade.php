@extends('layouts.master')
@section('before-css')


@endsection

@section('main-content')
   <div class="breadcrumb">
              
    </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title mb-3">Create Course</div>
                            <form method="POST" action="{{ route('courses.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                
                                <div class="form-group col-6">
                                    <label class="form-control-label" for="title">{{ __('Title') }}</label>
                                    <input type="text" name="title" id="title" class="form-control form-control-alternative @error('title') is-invalid @enderror" placeholder="{{ __('Title') }}" value="{{old('title')}}">
                                    
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label class="form-control-label" for="link">{{ __('Link') }}</label>
                                    <input type="url" name="link" id="link" class="form-control form-control-alternative @error('link') is-invalid @enderror" placeholder="{{ __('Link') }}" value="{{old('link')}}">
                                    
                                    @error('link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                              
                                    <div class="form-group col-6">
                                        <label class="form-control-label" for="input-status">{{ __('Status') }}</label>
                                        <select name="status"  class="form-control parent" id="status">
                                            <option value="0">Free</option>
                                            <option value="1">Paid</option>
                                        </select>
                                   </div>
                                   <div class="form-group col-6">
                                    <label class="form-control-label" for="input-parent_id">{{ __('Tracks') }}</label>
                                    <select name="track_id"  class="form-control parent" id="tracks">
                                        @foreach (\App\Models\Track::all() as $track)
                                        <option value="{{$track->id}}">{{$track->name}}</option>
                                        @endforeach
                                
                                       
                                    </select>
                               </div>
                               <div class="form-group col-6">
                                <label class="form-control-label" for="input-name">{{ __('Image') }}</label>
                                <input type="file" name="image" id="image" class="form-control form-control-alternative" placeholder="{{ __('Image') }}">
                               
                                </div>


                                    <div class="col-md-12">
                                         <button class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>


@endsection

@section('page-js')




@endsection

@section('bottom-js')