<?php

use Illuminate\Database\Seeder;
use App\Courses;
use Illuminate\Support\Facades\DB;

class QuizzesTableSeeder extends Seeder
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
    			
    		DB::table("quizzes")->insert([
    			["quiz_title" => $value->course_name . " Quiz 1 "],
    			["quiz_title" => $value->course_name ." Quiz 2 "]
    		]);
    	}
    }
}
