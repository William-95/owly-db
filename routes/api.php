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
Route::get('/course',[ApiController::class,'readCourse']);
Route::post('/course',[ApiController::class,'createCourse']);
Route::put('/course/{id}',[ApiController::class,'updateCourse']);
Route::delete('/course/{name_course}',[ApiController::class,'deleteCourse']);


// ------------ //----------//--------//-----------//// ------------ //----------//--------//-----------//


// SUBJECTS
Route::get('/subjects',[ApiController::class,'readSubjects']);
Route::post('/subjects',[ApiController::class,'createSubjects']);
Route::put('/subjects/{id}',[ApiController::class,'updateSubjects']);
Route::delete('/subjects/{id}',[ApiController::class,'deleteSubjects']);


// ------------ //----------//--------//-----------//// ------------ //----------//--------//-----------//


// FILTER COURSE
Route::post('/filter/name={name_course}',[ApiController::class,'filterByName']);
Route::post('/filter/places={places_vailable}',[ApiController::class,'filterByPlaces']);
Route::post('/filter/subject={subjects}',[ApiController::class,'filterBySubjects']);