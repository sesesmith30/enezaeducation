<?php

namespace App;

use App\User;
use App\Quiz;
use App\Option;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

	protected $fillable = ["id","question","correct_option_id"];
	

	public function quiz () {
		return $this->belongsToMany(Quiz::class);
	}

	public function options() {

		return $this->hasMany(Option::class);
	}


	
}
