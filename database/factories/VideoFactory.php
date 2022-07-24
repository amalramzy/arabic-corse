<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Video;
use App\Models\Course;

class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Video::class;

    public function definition()
    {
        return [
            'title' => $this->faker->paragraph(),
            'link' => $this->faker->url(),
            'course_id'=> Course::all()->random()->id,
        ];
    }
}
