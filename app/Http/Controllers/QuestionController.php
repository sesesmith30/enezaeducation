<?php

namespace App\Http\Controllers;


use DB;
use Auth;
use App\Tutorial;
use App\Question;
use App\Subject;
use App\User;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    


    public function getAllQuestion() {

    	return $this->successResponse(Question::all());
    }


    public function addQuestion(Request $request) {

    	$data = $request->validate([
    		"question" => "required"
    	]);


    	$question = Question::create($data);



    	return $this->successResponse($question);

    }


    public function editQuestion(Request $request) {

    	$request->validate([
    		"question" => "required"
    	]);


    	$question = Question::find($request->id);
    	$question->question  = $request->question;
    	$question->save();


    	return $this->successResponse($question);


    }


    public function deleteQuestion(Request $request) {

    	$question = Question::find($request->id);
    	if(isset($question)){

    		$question->delete();
    	}


    	return $this->successResponse(["message" => "deleted"]);

    }


    public function getAQuestionsOptions(Request $request) {


    	$options = Question::find($request->id)->options;

    	return $this->successResponse($options);


    }


    public function addOptionToQuestion(Request $request) {

        $data = $request->validate([
            "option_string" => "required",
            "option_letter" => "required"
        ]);

        $data["question_id"] = $request->id;


        $option = option::create($data);

        return $this->successResponse($option);
    }


    public function deleteQuestionsOption(Request $request) {


        $option = Option::find($request->option_id);
        if(isset($option)) {
            $option->delete();
        }

        return $this->successResponse(["message" => "deleted"]);
    }


    // public function addOptionToQuestion(Request $request){

    // 	$data = [
    // 		"option_id" => $request->option_id,
    // 		"question_id" => $request->id
    // 	];



    // 	DB::table("option_question")->insert($data);


    // 	return $this->successResponse(["message" => "created"]);
    // }


    // public function deleteQuestionsOption(Request $request) {

    // 	$questionOption = DB::table("option_question")->where("option_id",$request->option_id)->where("question_id",$request->question_id)->first();

    // 	if(isset($questionOption) ){

    // 		$questionOption->delete();
    // 	}

    // 	return $this->successResponse(["message" => "deleted"]);
    // }

}
