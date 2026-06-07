<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class registerController extends Controller
{
      public function show() {
            return view('auth.register');
      }

      public function store(Request $request) {

            $validate = $request->validate([
                'fullName' => 'required',
                'username' => 'required|unique:users',
                'email'  => 'required|email|unique:users',
                'password' => 'required|confirmed'

            ]);

            $user = User::create([
                'fullName' => $validate['fullName'],
                'username' => $validate['username'],
                'email' => $validate['email'],
                'password' => Hash::make($request['password']),
            ]);


            #Auto login users
            Auth::login($user);


            return redirect()->route('users')->with("success", "User successfully created");
      }
}
