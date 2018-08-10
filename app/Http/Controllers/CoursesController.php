<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use App\Courses;
use App\Subject;

use Illuminate\Http\Request;

class CoursesController extends Controller
{
    

    public function getAllCourses () {
    	
    	$courses = Courses::orderBy("created_at","desc")->get();

    	return $this->successResponse(["courses" => $courses]);

    }


    public function addCouse(Request $request) {

    	$data = $request->validate([
    			"course_name" => "required"
    	]);

    	$course = Courses::create($data);


    	return $this->successResponse(["message" => "created"]);



    }


    public function editCourse(Request $request){
    	$data = $request->validate([
    			"course_name" => "required"
    	]);

    	$course = Courses::find($request->id);
    	$course->course_name = $data["course_name"];
    	$course->save();


    	return $this->successResponse(["message" => "updated"]);

    }


    public function deleteCourse(Request $request) {
    	$course = Courses::find($request->id);
    	$course->delete();

    	return $this->successResponse(["message" => "deleted"]);
    }


    // public function addSubjectToCourse(Request $request) {

    // 	$data = [
    // 			"course_id" =>  $request->id,
    // 			"subject_id" => $request->subject_id
    // 		];

    // 	DB::table("course_subject")->insert($data);

    // }

    // public function deleteCoursesSubject(Request $request) {

    // 	$course  = DB::table("course_subject")->where("course_id",$request->course_id)->where("subject_id",$request->subject_id)->first();

    // 	if (isset($course)) {
	   //  	$course->delete();

    // 	}

    // 	return $this->successResponse(["message" => "deleted"])
    // }




    public function getACoursesSubjects(Request $request) {

        $subjects = Courses::find($request->id)->subjects;
        
        return $this->successResponse($subjects);
    }
}
