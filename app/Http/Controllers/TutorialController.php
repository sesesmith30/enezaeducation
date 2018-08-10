<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Subject;
use App\Tutorial;
use Illuminate\Http\Request;

class TutorialController extends Controller
{
    


    public function getAllTutorial(Request $request) {

    	return $this->successResponse(Tutorial::all());

    }

    public function addTutorial(Request $request) {

    	$data = $request->validate([
    		"tutorial_title" => "required",
    		"content" => "required"
    	]);

    	$tutorial = Tutorial::create($data);


    	return $this->successResponse($tutorial);

    }


    public function editTutorial(Request $request) {

    	$request->validate([
    		"tutorial_title" => "required",
    		"content" => "required"
    	]);



    	$tutorial = Tutorial::find($request->id);
    	$tutorial->tutorial_title = $request->tutorial_title;
    	$tutorial->content = $request->content;
    	$tutorial->save();

    	return $this->successResponse($tutorial);

    }

    public function deleteTutorial(Request $request) {

    	$tutorial = Tutorial::find($request->id);

    	if(isset($tutorial) ) {
    		$tutorial->delete();
    	}


    	return $this->successResponse(["message" => "deleted"]);

    }
}
