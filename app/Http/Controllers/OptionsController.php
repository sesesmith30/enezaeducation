<?php

namespace App\Http\Controllers;


use DB;
use Auth;
use App\User;
use App\Question;
use App\Option;
use Illuminate\Http\Request;

class OptionsController extends Controller
{
    //


    public function getAllOption() {


    	return $this->successResponse(Option::all());

    }


}
