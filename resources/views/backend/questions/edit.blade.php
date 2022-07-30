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
                            <div class="card-title mb-3">Edit Quiz</div>
                            <form method="POST" action="{{ route('questions.update', [$question->id]) }}">
                                @csrf
                                {{method_field('PUT')}}
                                <div class="row">
                                
                                    <div class="form-group col-6">
                                        <label class="form-control-label" for="title">{{ __('Title') }}</label>
                                        <input type="text" name="title" id="title" class="form-control form-control-alternative @error('title') is-invalid @enderror" placeholder="{{ __('Title') }}" value="{{$question->title}}">
                                        
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="form-control-label" for="answers">{{ __('Answers') }}</label>
                                        <input type="text" name="answers" id="answers" class="form-control form-control-alternative @error('answers') is-invalid @enderror" placeholder="{{ __('Answers') }}" value="{{$question->answers}}">
                                        
                                        @error('answers')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="form-control-label" for="right_answer">{{ __('Right Answer') }}</label>
                                        <input type="text" name="right_answer" id="right_answer" class="form-control form-control-alternative @error('right_answer') is-invalid @enderror" placeholder="{{ __('Right Answer') }}" value="{{$question->right_answer}}">
                                        
                                        @error('right_answer')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="form-control-label" for="score">{{ __('Score') }}</label>
                                        <input type="number" name="score" id="score" class="form-control form-control-alternative @error('score') is-invalid @enderror" placeholder="{{ __('Score') }}" value="{{$question->score}}">
                                        
                                        @error('score')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                  
                                    <div class="form-group col-6">
                                        <label class="form-control-label" for="input-parent_id">{{ __('Quiz') }}</label>
                                        <select name="quiz_id"  class="form-control parent" id="quiz">
                                            @foreach (\App\Models\Quiz::all() as $quiz)
                                             <option value="{{$quiz->id}}" @if($quiz->id == $question->quiz_id) selected @endif>{{$quiz->name}}</option>
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