<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class crudController extends Controller
{
    private $notes = [];

    public function notes() {

          $total = count($this->notes);

        return view('notes', ['notes' => $this->notes, 'total' => $total]);
    }

    public function addNote($text) {
          $notes = $this->notes;

          array_push($notes, $text);

          return view('notes', compact('notes'));
}


private $tasks = [
      ["name" => "Clean room", "status" => "pending"],
      ["name" => "Do homework", "status" => "pending"],
      ["name" => "Learn Laravel", "status" => "pending"]
  ];

  public function tasks() {

        return view('tasks', ['tasks' => $this->tasks]);
  }

  public function complete($taskName) {
      foreach ($this->tasks as $key => $task) {

            if($task['name'] === $taskName) {
                $this->task[$key]['status'] = "complete";

                break;
            }
      }

      return view('tasks', ['tasks' => $this->tasks]);
  }


  private $cart = ["Shoes", "Bag", "Phone"];

  public function cart() {

      $cart = $this->cart;
      $cartTotal = count($cart);
        return view('cart', compact('cart', 'cartTotal'));
  }

  public function addItem($newItem) {
        $cart = $this->cart;

        array_push($cart, $newItem);
        $cartTotal = count($cart);

        return view('cart', compact('cart'));
  }

  public function removeItem($itemName) {
      $cart = $this->cart;

        $key = array_search($itemName, $cart);

      if ($key !== false) {
            unset($cart[$key]);
      }

        $cart = array_values($cart);
        $cartTotal = count($cart);

        return view('cart', compact('cart'));
  }


  private $students1 = ["Kwame", "Ama", "Yaw"];

    public function students1() {
        $students1 = $this->students1;
        $totalStudents = count($students1);

        return view('students1', compact('students1', 'totalStudents'));
    }

    public function addStudent($studentName) {
        $students1 = $this->students1;

        array_push($students1, $studentName);
        $totalStudents = count($students1);

        return view('students1', compact('students1', 'totalStudents'));
    }

    public function removeStudent($studentName) {
          $students1 = $this->students1;

          $key = array_search($studentName, $students1);

          if($key !== false) {
              unset($students1[$key]);
          }

          $totalStudents = count($students1);

          return view('students1', compact('students1', 'totalStudents'));
    }

    public function findStudent($studentName) {
        $students1 = $this->students1;

        $key = array_search($studentName, $students1);

        if ($key !== false) {
            $student = $students1[$key];
          }
        else{
            $student = "Student not found";
        }

        return view('student', compact('student'));
    }


}
