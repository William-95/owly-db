<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// COURSE
Route::get('/course',[CourseController::class,'readCourse']);
Route::post('/course',[CourseController::class,'createCourse']);
Route::put('/course/{id}',[CourseController::class,'updateCourse']);
Route::delete('/course/{name_course}',[CourseController::class,'deleteCourse']);


// ------------ //----------//--------//-----------//// ------------ //----------//--------//-----------//


// SUBJECTS
Route::get('/subjects',[SubjectController::class,'readSubjects']);
Route::post('/subjects',[SubjectController::class,'createSubjects']);
Route::put('/subjects/{id}',[SubjectController::class,'updateSubjects']);
Route::delete('/subjects/{id}',[SubjectController::class,'deleteSubjects']);


// ------------ //----------//--------//-----------//// ------------ //----------//--------//-----------//


// FILTER COURSE
Route::post('/filter/name={name_course}',[CourseController::class,'filterByName']);
Route::post('/filter/places={places_vailable}',[CourseController::class,'filterByPlaces']);
Route::post('/filter/subject={subjects}',[CourseController::class,'filterBySubjects']);