<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CoursesTableSeeder::class);
        $this->call(OptionsTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(QuizzesTableSeeder::class);
        $this->call(SubjectsTableSeeder::class);
        $this->call(TutorialTableSeeder::class);
    }
}
