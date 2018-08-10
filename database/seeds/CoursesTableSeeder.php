<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("courses")->insert([

        	["course_name" => "Primary"],
        	["course_name" => "Secondary"],
        	["course_name" => "Level 1"],
        	["course_name" => "Level 2"],
        	["course_name" => "Beginner"],
        	["course_name" => "Advanced"]
        ]);
    }
}
