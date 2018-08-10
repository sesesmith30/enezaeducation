<?php

namespace App;

use App\Question;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    

    protected $fillable = ["id","question_id","option_string","option_letter"];


    public function question() {
    	return $this->belongsTo(Question::class);
    }
}
