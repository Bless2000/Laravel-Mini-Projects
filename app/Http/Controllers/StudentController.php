<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
      public function create() {
          return view('students.create');
      }

      public function store(Request $request) {

          $validated = $request->validate([
              'name' => 'required',
              'score' => 'required|integer|min:0|max:100'
          ]);

          $student = new Student();
          $student->name = $validated['name'];
          $student->score = $validated['score'];
          $student->save();

          return redirect()->route('students.index')->with('success', 'Student Added');
      }

      public function index() {
          $students = Student::all();
          return view('students.index', compact('students'));
      }

      public function remove($id) {
          $student = Student::findOrFail($id);
          $student->delete();

          return redirect()->route('students.index')->with("Success", "Student has been removed from the list");
      }
}
