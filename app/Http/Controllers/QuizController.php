<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Quiz;
use App\User;
use App\Subject;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    

    public function getAllQuiz() {

    	return $this->successResponse(Quiz::all());
    }

    public function addQuiz(Request $request) {

    	$data = $request->validate([
    		"quiz_title" => "required"
    	]);


    	$quiz = Quiz::create($data);


    	return $this->successResponse($quiz);

    }


    public function editQuiz(Request $request){

    	$data = $request->validate([
    		"quiz_title" => "required"
    	]);


    	$quiz = Quiz::find($request->id);
    	$quiz->quiz_title = $data["quiz_title"];
    	$quiz->save();

    	return $this->successResponse($quiz);

    }



    public function deleteQuiz(Request $request) {

    	$quiz = Quiz::find($request->id);

    	if(isset($quiz)) {
    		$quiz->delete();
    	}

    	return $this->successResponse(["message" => "deleted"]);


    }


    public function getAQuizQuestions(Request $request) {

    	$questions = Quiz::find($request->id)->questions;


    	return $this->successResponse($questions);


    }


    public function addQuestionToQuiz(Request $request) {

    	$data = [
    		"question_id" => $request->question_id,
    		"quiz_id" => $request->id
    	];

    	DB::table("question_quiz")->insert($data);

    	return $this->successResponse(["message"=> "added"]);

    }


    public function deleteQuizzesQuestion(Request $request) {

    	$questionQuiz = DB::table("question_quiz")->where("question_id",$request->question_id)->where("quiz_id",$request->id);
    	if(isset($questionQuiz)){

    		$questionQuiz->delete();
    	}


    	return $this->successResponse(["message" => "deleted"] );

    }





}
