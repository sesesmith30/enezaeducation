<?php

namespace App\Http\Controllers;


use DB;
use Auth;
use App\Courses;
use App\Subject;
use App\Quiz;

use Illuminate\Http\Request;

class SubjectController extends Controller
{
    

    public function getAllSubject() {

    	$subject = Subject::all();

    	return $this->successResponse($subject);
    }

    public function addSubject(Request $request) {

    	$data = $request->validate([
    		"courses_id" => "required",
    		"subject_name" => "required"
    	]);	


    	$subject = Subject::create($data);


    	return $this->successResponse($data);

    }

    public function editSubject (Request $request) {

    	$request->validate([
    		"courses_id" => "required",
    		"subject_name" => "required"
    	]);	

    	$subject = Subject::find($request->id);


    	$subject->courses_id = $request->courses_id;
    	$subject->subject_name = $request->subject_name;
    	$subject->save();



    	return $this->successResponse($subject);

    }


    public function deleteSubject(Request $request) {

    	Subject::find($request->id)->delete();

    	return $this->successResponse(["message"=> "deleted"]);

    }


    public function addQuizToSubject(Request $request) {

    	$data = [
    			"quiz_id" => $request->quiz_id,
    			"subject_id" => $request->id 
    		];



    	DB::table("quiz_subject")->insert($data);


    	return $this->successResponse(["message" => "quiz id: $request->quiz_id has been added to subject id:$request->id"]);

    }	



    public function addTutorialToSubject(Request $request) {

    	$data = [
    			"tutorial_id" => $request->tutorial_id,
    			"subject_id" => $request->id
    		];


    	DB::table("subject_tutorial")->insert($data);


    	return $this->successResponse(["message" => "tutorial id: $request->tutorial_id has been added to subject id:$request->id"]);



    }


    public function getSubjectQuizes(Request $request)  {

    	$quizzes = Subject::find($request->id)->quizzes;

    	return $this->successResponse($quizzes);

    }


    public function getSubjectTutorials(Request $request) {

		$tutorials = Subject::find($request->id)->tutorials;

    	return $this->successResponse($tutorials);

    }


    public function deleteSubjectsTutorial(Request $request) {

    	$subjectTutorial = DB::table("subject_tutorial")->where("subject_id",$request->id)->where("tutorial_id",$request->tutorial_id);

    	if(isset($subjectTutorial) ){

    		$subjectTutorial->delete();
    	}

    	return $this->successResponse(["message" => "deleted"]);

    }

    public function deleteSubjectQuiz(Request $request) {

    	$subjectQuiz = DB::table("quiz_subject")->where("subject_id",$request->id)->where("quiz_id",$request->quiz_id);


    	if(isset($subjectQuiz)) {

    		$subjectQuiz->delete();
    	}

    	return $this->successResponse(["message" => "deleted"]);

    }






}
