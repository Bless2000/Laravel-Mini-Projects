<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class loginController extends Controller
{

        public function show() {
            return view('auth.login');
        }

        public function store(Request $request) {
              $credentials = $request->validate([
                  'username' => 'required',
                  'password' => 'required'
              ]);

              $remember = $request->boolean('remember');

              if(!Auth::attempt($credentials, $remember)) {
                  throw validationException::withMessages([
                      'username' => __('auth.failed')
                  ]);



              }

              $request->session()->regenerate();

              return redirect()->intended(route('users'));

        }


        //Logout
        public function logout(Request $request) {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/');
        }

}
