<?php

namespace App;

use App\Subject;

use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    
    protected $fillable = ["id","tutorial_title","content"];


    
    public function subject() {
    	return $this->belongsTo(Subject::class);
    }
}
