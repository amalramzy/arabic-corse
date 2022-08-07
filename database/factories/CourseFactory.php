<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Track;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->paragraph();
        return [
            'title' => $title,
            'description' => $this->faker->paragraph(),
            'slug' => strtolower(str_replace(' ', '-', $title)),
            'status' => $this->faker->randomElement([0, 1]),
            'link' => $this->faker->url(),
            'track_id'=> Track::all()->random()->id,
        ];
    }
}
