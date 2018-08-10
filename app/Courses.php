<?php

namespace App;


use App\User;
use App\Subject;


use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{


	protected $fillable = ["id","course_name"];

    public function user() {
    	return $this->belongsToMany(User::class);
    }

    public function subjects() {
    	return $this->hasMany(Subject::class);
    }



}
