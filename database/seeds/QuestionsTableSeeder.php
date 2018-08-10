<?php

use Illuminate\Database\Seeder;

use App\Quiz;
use Illuminate\Support\Facades\DB;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$quizzes = Quiz::all();

        $faker = Faker\Factory::create();

    	foreach ($quizzes as $key => $value) {
    			
    		DB::table("questions")->insert([
    			["question" => $faker->realText($maxNbChars = 50, $indexSize = 2)],
    			["question" => $faker->realText($maxNbChars = 50, $indexSize = 2)],
    			["question" => $faker->realText($maxNbChars = 50, $indexSize = 2)]
    		]);
    	}
    }
}
