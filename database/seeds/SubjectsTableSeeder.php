<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("subjects")->insert([

        	["courses_id" => 1,"subject_name" => "English"],
        	["courses_id" => 1,"subject_name" => "Mathematics"],
        	["courses_id" => 1,"subject_name" => "Science"],
        	["courses_id" => 2,"subject_name" => "Science"],
        	["courses_id" => 2,"subject_name" => "Mathematics"],
        	["courses_id" => 2,"subject_name" => "Social Studies"],
        	["courses_id" => 3,"subject_name" => "Social Studies"],
        	["courses_id" => 3,"subject_name" => "Science"],
        	["courses_id" => 3,"subject_name" => "Mathematics"],
        	["courses_id" => 4,"subject_name" => "Mathematics"],
        	["courses_id" => 4,"subject_name" => "Science"],
        	["courses_id" => 4,"subject_name" => "Swahili"],
        	["courses_id" => 5,"subject_name" => "Social Studies"],
        	["courses_id" => 5,"subject_name" => "English"],
        	["courses_id" => 5,"subject_name" => "Mathematics"],
        	["courses_id" => 6,"subject_name" => "Mathematics"],
        	["courses_id" => 6,"subject_name" => "Science"],
        	["courses_id" => 6,"subject_name" => "Swahili"],

        ]);
    }
}
