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
                            <div class="card-title mb-3">Edit Course</div>
                            <form method="POST" action="{{ route('update.courses', [$course->id, $course->track_id]) }}">
                                @csrf
                                {{method_field('PUT')}}
                                <div class="row">
                                    <input type="hidden" value="{{$track->id}}" name="track_id">

                                    <div class="form-group col-6">
                                        <label class="form-control-label" for="title">{{ __('Title') }}</label>
                                        <input type="text" name="title" id="title" class="form-control form-control-alternative @error('title') is-invalid @enderror" placeholder="{{ __('Title') }}" value="{{$course->title}}">
                                        
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="form-control-label" for="link">{{ __('Link') }}</label>
                                        <input type="url" name="link" id="link" class="form-control form-control-alternative @error('link') is-invalid @enderror" placeholder="{{ __('Link') }}" value="{{$course->link}}">
                                        
                                        @error('link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="form-control-label" for="input-status">{{ __('Status') }}</label>
                                        <select name="status"  class="form-control parent form-control-alternative @error('status') is-invalid @enderror" @if($course->status == "1" )selected @endif id="status">
                                            <option value="0">Free</option>
                                            <option value="1">Paid</option>
                                        </select>
    
                                        @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
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