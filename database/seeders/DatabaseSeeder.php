<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Models\Course;
use App\Models\Photo;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\User;
use App\Models\Track;
use App\Models\Video;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(10)->create();
        Track::factory()->count(10)->create();
        Course::factory()->count(50)->create();
        Video::factory()->count(50)->create();
        Photo::factory()->count(50)->create();
        Quiz::factory()->count(100)->create();
        Question::factory()->count(200)->create();
        Admin::create([
            'name'=>'admin',
            'email'=>'adminadmin@gmail.com',
            'password'=>Hash::make('12345678')
        ]);
        // User::factory(10)->create();
    }
}
