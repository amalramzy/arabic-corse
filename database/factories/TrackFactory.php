<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Track;

class TrackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Track::class;

    public function definition()
    {
        return [
           'name' => $this->faker->word(),

        ];
    }
}
