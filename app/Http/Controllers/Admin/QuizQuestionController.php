<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;

class QuizQuestionController extends Controller
{
    
    public function create(Quiz $quiz)
    {
        return view('backend.quizzes.createQuestion',compact('quiz'));
    }

  
    public function store(Request $request,Quiz $quiz)
    {
        $question=new Question($request->all());
        $question->save();
        return redirect('/admin/quizzes/'.$quiz->id)->with('message', 'Question has been Created Succesfuly');
    }

  
}
