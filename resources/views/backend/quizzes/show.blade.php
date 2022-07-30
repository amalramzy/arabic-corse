@extends('layouts.master')
@section('before-css')


@endsection

@section('main-content')
   <div class="breadcrumb">
    <div class="text-left p-3">
      <div class="col-12">Quiz Name: {{$quiz->name}}</div>
        <a class="btn btn-icon btn-primary btn-create" href="/admin/quizzes/{{$quiz->id}}/questions/create">
        <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
        <span class="btn-inner--text">Add Question</span>
      </a>
  </div>   
    </div>
            <div class="row">
                
                @foreach($quiz->questions as $key => $question)
                    
                
                <div class="col-4">
                    <div id="simple-list-example" class="d-flex flex-column gap-2 simple-list-example-scrollspy text-center">
                      <a class="p-1 rounded" href="#{{$question->title}}">{{$question->title}}</a>
                    
                    </div>
                  </div>
                  <div class="col-8">
                    <div data-bs-spy="scroll" data-bs-target="#simple-list-example" data-bs-offset="0" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">
                      <h4 id="{{$question->title}}">{{$question->title}}</h4>
                      <ul class="list-group">
                        <li class="list-group-item active" aria-current="true">{{$question->right_answer}}</li>
                        <li class="list-group-item">{{$question->answers}}</li>
                        
                      </ul>
                       <h3>Score: {{$question->score}} </h3>
                       <form id="delete-form{{$question->id}}" method="POST" action="{{route('questions.destroy', $question->id)}}" >@csrf
                        {{method_field('DELETE')}}
                       </form> 
                        <a href="#" onclick="if(confirm('Do you want to delete?')){
                            event.preventDefault();
                            document.getElementById('delete-form{{$question->id}}').submit()
                        }else{
                            event.preventDefault();
                        }
                        ">
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </a>
                    <a href="{{route('questions.edit',$question->id)}}">
                        <button class="btn btn-primary">Edit</button>
                    </a>
                       <hr>

                    </div>
                  </div>
                  @endforeach

            </div>


@endsection

@section('page-js')




@endsection

@section('bottom-js')