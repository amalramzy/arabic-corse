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
                            <div class="card-title mb-3">Create Quiz</div>
                            <form method="POST" action="{{ route('quizzes.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                
                                <div class="form-group col-6">
                                    <label class="form-control-label" for="name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="name" class="form-control form-control-alternative @error('name') is-invalid @enderror" placeholder="{{ __('Name') }}" value="{{old('name')}}">
                                    
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                              
                                <div class="form-group col-6">
                                    <label class="form-control-label" for="input-parent_id">{{ __('Course') }}</label>
                                    <select name="course_id"  class="form-control parent" id="course">
                                        @foreach (\App\Models\Course::all() as $course)
                                         <option value="{{$course->id}}">{{\Str::limit($course->title, 20)}}</option>
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