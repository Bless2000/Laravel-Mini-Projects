<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;


class TaskController extends Controller
{
  public function create() {
        return view('tasks.create');
    }

    public function store(Request $request) {
        
        $task = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

          $task = new Task;
          $task->title = $request->title;
          $task->description = $request->description;
          $task->save();

          return redirect()->route('tasks.create')->with('Task Created Successfully');
    }

    public function index() {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function complete($id) {
        $task = Task::findOrFail($id);
        $task->is_completed = true;
        $task->save();

        return back(); //sends user back to the list
    }

    public function delete($id) {
        $task= Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('Successfully deleted task');
    }

}
