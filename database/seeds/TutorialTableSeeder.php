<?php

use Illuminate\Database\Seeder;
use App\Courses;
use Illuminate\Support\Facades\DB;


class TutorialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

    	$courses = Courses::all();
    	$faker = Faker\Factory::create();

    	foreach ($courses as $key => $value) {
    			
    		DB::table("tutorials")->insert([
    			["tutorial_title" => $value->course_name . " ".$faker->address, "content" => $faker->text ],
    			["tutorial_title" => $value->course_name ." ".$faker->address, "content" => $faker->text ]
    		]);
    	}


    }
}
