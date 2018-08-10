<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/




Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post("login","UserController@login");
Route::post("register","UserController@register");


Route::middleware(['auth:api'])->group(function () {

	//Courses
	Route::get("course/all","CoursesController@getAllCourses");
	Route::post("course/add","CoursesController@addCouse");
	Route::put("course/{id}/edit","CoursesController@editCourse");
	Route::delete("course/{id}/delete","CoursesController@deleteCourse");
	//Route::post("course/{id}/subject/{subject_id}/add","CoursesController@addSubjectToCourse");
	//Route::delete("course/{id}/subject/{subject_id}/delete","CoursesController@deleteCoursesSubject");
	Route::get("course/{id}/subject/all","CoursesController@getACoursesSubjects");


	//Subjects
	Route::get("subject/all","SubjectController@getAllSubject");
	Route::post("subject/add","SubjectController@addSubject");
	Route::put("subject/{id}/edit","SubjectController@editSubject");
	Route::delete("subject/{id}/delete","SubjectController@deleteSubject");


	Route::post("subject/{id}/quiz/{quiz_id}/add","SubjectController@addQuizToSubject");
	Route::post("subject/{id}/tutorial/{tutorial_id}/add","SubjectController@addTutorialToSubject");
	Route::get("subject/{id}/quizes","SubjectController@getSubjectQuizes");
	Route::get("subject/{id}/tutorials","SubjectController@getSubjectTutorials");


	Route::delete("subject/{id}/tutorial/{tutorial_id}/delete","SubjectController@deleteSubjectsTutorial");
	Route::delete("subject/{id}/quiz/{quiz_id}/delete","SubjectController@deleteSubjectQuiz");



	//Quiz
	Route::get("quiz/all","QuizController@getAllQuiz");
	Route::post("quiz/add","QuizController@addQuiz");
	Route::put("quiz/{id}/edit","QuizController@editQuiz");
	Route::delete("quiz/{id}/delete","QuizController@deleteQuiz");


	Route::get("quiz/{id}/questions/all","QuizController@getAQuizQuestions");
	Route::post("quiz/{id}/question/{question_id}/add","QuizController@addQuestionToQuiz");
	Route::delete("quiz/{id}/question/{question_id}/delete","QuizController@deleteQuizzesQuestion");



	//Tutorial
	Route::get("tutorial/all","TutorialController@getAllTutorial");
	Route::post("tutorial/add","TutorialController@addTutorial");
	Route::put("tutorial/{id}/edit","TutorialController@editTutorial");
	Route::delete("tutorial/{id}/delete","TutorialController@deleteTutorial");


	//Questions
	Route::get("question/all","QuestionController@getAllQuestion");
	Route::post("question/add","QuestionController@addQuestion");
	Route::put("question/{id}/edit","QuestionController@editQuestion");
	Route::delete("question/{id}/delete","QuestionController@deleteQuestion");
	Route::get("question/{id}/options/all","QuestionController@getAQuestionsOptions");
	Route::post("question/{id}/options/add","QuestionController@addOptionToQuestion");
	Route::delete("question/options/{option_id}/delete","QuestionController@deleteQuestionsOption");



	//Options
	/*
	|--------------------------------------------------------------------------
	|This is very custom 
	|--------------------------------------------------------------------------
	*/


	// Route::get("options/all","OptionsController@getAllOption");
	// Route::post("options/add","OptionsController@addOption");
	// Route::put("options/{id}/edit","OptionsController@editOption");
	// Route::delete("options/{id}/delete","OptionsController@deleteOption");




});