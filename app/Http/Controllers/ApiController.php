<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\Subjects;


class ApiController extends Controller
{
// read course
public function readCourse()
{
  $course = DB::table("course")
    ->select(
      "course.id",
      "name_course",
      "places_available",
      DB::raw("GROUP_CONCAT(name SEPARATOR ', ')as `subjects_list`")
    )
    ->leftJoin(
      "subjects",
      "owly_db.course.id",
      "=",
      "owly_db.subjects.course_id"
    )
    ->groupBy("course.name_course")
    ->orderBy("course.id")
    ->get();

   
  return response()->json($course); 
}

// create course
public function createCourse(Request $request)
{
  $course = new Course();

  $cleaned_name = filter_var($request->input('name_course'),FILTER_SANITIZE_STRING);
  $cleaned_places = filter_var($request->input("places_available"),FILTER_SANITIZE_STRING);

  $course->name_course = $cleaned_name;
  $course->places_available = $cleaned_places;

  $course->save();

  return response()->json($course);
}

//   update Course
public function updateCourse(Request $request, $id)
{
  $course = Course::find($id);

  $cleaned_name = filter_var($request->input('name_course'),FILTER_SANITIZE_STRING);
  $cleaned_places = filter_var($request->input("places_available"),FILTER_SANITIZE_STRING);

  $course->name_course = $cleaned_name;
  $course->places_available = $cleaned_places;

  $course->save();

  return response()->json($course);
}

// delete Course
public function deleteCourse($name_course)
{
  $cleaned_name = filter_var($name_course,FILTER_SANITIZE_STRING);
  DB::delete('delete from course where name_course=?',[$cleaned_name]);

  return response()->json("Course delete.");
}

// ------------ //----------//--------//-----------//// ------------ //----------//--------//-----------//

// read Subjects
public function readSubjects()
{
  $subjects = Subjects::all();

  return response()->json($subjects);
}

// create Subjects
public function createSubjects(Request $request)
{
  $subjects = new Subjects();

  $cleaned_id = filter_var($request->input('course_id'),FILTER_SANITIZE_STRING);
  $cleaned_name = filter_var($request->input("name"),FILTER_SANITIZE_STRING);

  $subjects->course_id = $cleaned_id;
  $subjects->name = $cleaned_name;

  $subjects->save();

  return response()->json($subjects);
}

//   update subjects
public function updateSubjects(Request $request, $id)
{
  $subjects = Subjects::find($id);

  $cleaned_id = filter_var($request->input('course_id'),FILTER_SANITIZE_STRING);
  $cleaned_name = filter_var($request->input("name"),FILTER_SANITIZE_STRING);

  $subjects->course_id = $cleaned_id;
  $subjects->name = $cleaned_name;

  $subjects->save();
  
  return response()->json($subjects);
}

// delete Subjects
public function deleteSubjects($id)
{
  $cleaned_id = filter_var($id,FILTER_SANITIZE_STRING);

  $subjects = Subjects::find($cleaned_id);

  $subjects->delete();

  return response()->json("Subject delete.");
}

// ------------ //----------//--------//-----------//// ------------ //----------//--------//-----------//

// Filter course by name
public function filterByName($name_course)
{
  $cleaned_name = filter_var($name_course,FILTER_SANITIZE_STRING);

  $course = DB::table("course")
    ->select(
      "course.id",
      "name_course",
      "places_available",
      DB::raw("GROUP_CONCAT(name SEPARATOR ', ')as `subjects_list`")
    )
    ->leftJoin(
      "subjects",
      "owly_db.course.id",
      "=",
      "owly_db.subjects.course_id"
    )
    ->where("name_course", "=", $cleaned_name)
    ->get();

  return response()->json($course);
}

// Filter course by places_available
public function filterByPlaces($places_available)
{
  $cleaned_places = filter_var($places_available,FILTER_SANITIZE_STRING);


  $course = DB::table("course")
    ->select(
      "course.id",
      "name_course",
      "places_available",
      DB::raw("GROUP_CONCAT(name SEPARATOR ', ')as `subjects_list`")
    )
    ->leftJoin(
      "subjects",
      "owly_db.course.id",
      "=",
      "owly_db.subjects.course_id"
    )
    ->where("places_available", ">=", $cleaned_places)
    ->groupBy("course.name_course")
    ->orderBy("course.id")
    ->get();

  return response()->json($course);
}

// Filter course by subjects
public function filterBySubjects($subjects)
{
  $cleaned_subjects = filter_var($subjects,FILTER_SANITIZE_STRING);

  $course = DB::table("course")
    ->select(
      "course.id",
      "name_course",
      "places_available",
      DB::raw("GROUP_CONCAT(name SEPARATOR ', ')as `subjects_list`")
    )
    ->leftJoin(
      "subjects",
      "owly_db.course.id",
      "=",
      "owly_db.subjects.course_id"
    )
    ->groupBy("course.name_course")
    ->where("name", "like", "%" . $cleaned_subjects . "%")
    ->orderBy("course.id")
    ->get();

  return response()->json($course);
}
}
