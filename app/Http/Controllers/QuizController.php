<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Quiz;


class QuizController extends Controller
{
    public function index($slug, $name){
        $course = Course::where('slug', $slug)->first();
        $quiz = $course->quizzes->where('name', $name)->first();
        return view('frontend.quiz',compact('course','quiz'));
     }

     public function submit($slug, $name, Request $request){
       
        $quiz =Quiz::where('name', $name)->first();
        $questions = $quiz->questions;
        $quiz_score = 0;
        // dd($questions);
        $questions_ids = [];
        $questions_right_answers = [];
        foreach($questions as $question){
            $questions_ids[] = $question->id;
            $questions_right_answers[] = $question->right_answer;
            $quiz_score += $question->score;
        }
        //
        for($i = 0; $i < count($questions_ids); $i++){
            $your_answer = $request['answer'.$questions_ids[$i]];
            $the_answer = $questions_right_answers[$i];
            if($your_answer != $the_answer){
                
              return redirect(url("auth/course/quizzes/{$slug}/{$name}"))->with('message', 'your answer '.$your_answer. ' is not correct');

            }
        }
         $user = auth()->user();
         
         $user->quizzes()->attach([$quiz->id]);
         $user->score += $quiz_score;
         $user->save();
        return redirect(url("auth/course/{$slug}"))->with('message', 'well Done '.$quiz->name. ' Your Score '.$quiz_score. ' Points');

     }
}
