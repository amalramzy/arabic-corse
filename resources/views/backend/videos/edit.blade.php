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
                            <div class="card-title mb-3">Edit Video</div>
                            <form method="POST" action="{{ route('videos.update', [$video->id]) }}">
                                @csrf
                                {{method_field('PUT')}}
                                <div class="row">
                                
                                    <div class="form-group col-6">
                                        <label class="form-control-label" for="title">{{ __('Title') }}</label>
                                        <input type="text" name="title" id="title" class="form-control form-control-alternative @error('title') is-invalid @enderror" placeholder="{{ __('Title') }}" value="{{$video->title}}">
                                        
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="form-control-label" for="link">{{ __('Link') }}</label>
                                        <input type="url" name="link" id="link" class="form-control form-control-alternative @error('link') is-invalid @enderror" placeholder="{{ __('Link') }}" value="{{$video->link}}">
                                        
                                        @error('link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="form-control-label" for="input-parent_id">{{ __('Course') }}</label>
                                        <select name="course_id"  class="form-control parent" id="course">
                                            @foreach (\App\Models\Course::all() as $course)
                                             <option value="{{$course->id}}" @if($course->id == $video->course_id) selected @endif>{{$course->title}}</option>
                                            @endforeach
                                        </select>
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