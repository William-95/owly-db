<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subjects;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
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
}
