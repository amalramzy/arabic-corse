<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Quiz;
use App\Models\Question;

class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Question::class;

    public function definition()
    {
        $answers =  $this->faker->paragraph();
        $right_answer = $this->faker->randomElement( explode(' ', $answers));
        $quizId= Quiz::all()->random()->id;
        return [
            'title' => $this->faker->paragraph(),
            'answers'=> $answers,
            'right_answer'=> $right_answer,
            'score'=> $this->faker->randomElement([10 ,20 ,30 ,40 ,50]),
            'quiz_id'=> $quizId, 
        ];
    }
}
