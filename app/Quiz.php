<?php

namespace App;

use App\Subject;
use App\Question;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    
    protected $fillable = ["id","quiz_title"];

    public function subject() {
    	return $this->belongsToMany(Subject::class);
    }


    public function questions() {
    	return $this->belongsToMany(Question::class);
    }


}
