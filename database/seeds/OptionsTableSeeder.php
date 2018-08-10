<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use App\Question;
class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        $questions = Question::all();

        $faker = Faker\Factory::create();

    	foreach ($questions as $key => $value) {
    			
    		
    			
    			for ($i=0; $i < $faker->biasedNumberBetween($min = 2, $max = 5); $i++) { 

    				DB::table("options")->insert([
    					["question_id" => $value->id, "option_string" => $faker->realText($maxNbChars = 20, $indexSize = 2), "option_letter" => $i + 1 ]
    				]);
    			}
	
    	}

    }
}
