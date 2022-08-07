@extends('layouts.app')

@section('content')
   <div class="container">
            @if (Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
             @endif
   <div class="quiz-container">
    <h2>{{$quiz->course->title}} : {{$quiz->name}}</h2>
       <div class="quiz-questions">
            <form action="{{url('auth/course/quizzes',[$course->slug,$quiz->name])}}" method="POST" >
                @csrf
                @foreach($quiz->questions as $key => $question)
             
                    <div class="mb-3">
                      <label for="answer" class="form-label">{{$question->title}} ?   <span><strong>({{$question->score}}) Points</strong></span> </label>
                      @if($question->type == 'text')
                        <input type="text" class="form-control" id="answer" name="answer{{$question->id}}" placeholder="Your Answer" >
                      @else
                        <?php $answers = explode(',' ,$question->answers); ?>
                        @foreach($answers as $key => $answer)
                       
                       <label class="form-control">
                        <input type="radio" name="answer{{$question->id}}" value="{{$answer}}">{{trim($answer)}}
                    </label>
                      
                        @endforeach
                      @endif
                    </div><hr>
                    
               
                @endforeach
                <button type="submit" class="btn btn-light">Submit</button>

            </form>
       </div>
   </div>
   </div>
@endsection