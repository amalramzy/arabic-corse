<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Quiz;
use App\Models\Course;

class QuizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Quiz::class;

    public function definition()
    {
         $courseId= Course::all()->random()->id;
        return [
            'name' => $this->faker->word(),
            'course_id'=> $courseId, 
        ];
    }
}
