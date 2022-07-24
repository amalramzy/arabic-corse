<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Course;
use App\Models\Photo;
use App\Models\User;

class PhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Photo::class;

    public function definition()
    {
         $userId = User::all()->random()->id;
        $courseId = Course::all()->random()->id;
        $photoable_id = $this->faker->randomElement([$userId, $courseId]);
        $photoable_type = $photoable_id == $userId ?'App\Models\User' : 'App\Models\Course';
        return [
           
            'fileName'=> $this->faker->randomElement(['1.jpg' ,'2.jpg' ,'3.jpg' ,'4.jpg' ,'5.jpg','6.jpg' ,'7.jpg' ,'8.jpg' ,'9.jpg' ,'10.jpg']),
            'photoable_id'=> $photoable_id,
            'photoable_type'=> $photoable_type,

        ];
    }
}
