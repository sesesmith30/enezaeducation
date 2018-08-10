<?php

namespace App;

use App\User;
use App\Courses;
use App\Subject;
use App\Quiz;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    
    protected $fillable = ["id","courses_id","subject_name"];

    public function course() {
    	return $this->belongsTo(Courses::class);
    }

    public function tutorials() {
    	return $this->belongsToMany(Tutorial::class);
    }

    public function quizzes () {
    	return $this->belongsToMany(Quiz::class);
    }

    
}
