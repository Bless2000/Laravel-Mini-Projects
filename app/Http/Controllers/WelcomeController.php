<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //

    public function hello() {
        return view("hello");
    }

    public function students() {
      $students = [
      "Kwame",
      "Ama",
      "Yaw",
      "Kojo"
  ];

      $total = count($students);
      $caps = [];
      foreach ($students as $student) {
          $caps[] = strtoupper($student);
      }

      return view('students', compact('students', 'caps', 'total'));
  }

  public function products()
{
    $products = [
        [
            'name' => 'Laptop',
            'price' => 5000,
            'quantity' => 2
        ],
        [
            'name' => 'Phone',
            'price' => 2000,
            'quantity' => 3
        ],
        [
            'name' => 'Headphones',
            'price' => 500,
            'quantity' => 5
        ],
    ];

    // calculate total value for each product
    foreach ($products as &$product) {
        $product['total'] = $product['price'] * $product['quantity'];
    }

    $grandTotal = 0;

      foreach ($products as $product) {
          $grandTotal += $product['total'];
      }

    return view('products', compact('products', 'grandTotal'));
}

  // public function user($name) {
  //     return view('user', compact('name'));
  // }


  private $users = ["Kwame", "Ama", "Kojo"];

  public function users() {

        return view('users', ['users' => $this->users]);
  }

  public function addUser($name) {
        $users = $this->users;

        array_push($users, $name);

        return view('users', compact('users'));
  }

  public function deleteUser($name) {
    $users = array_filter($this->users, function ($user) use ($name) {
          return $user !== $name;
      });

      return view('users', ['users' => $users]);
  }
}
