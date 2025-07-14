<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Session;
use Illuminate\Support\Facades\Auth;
use Hash;


class UserController extends Controller
{
    public function createUser(Request $request) {
        // Create the user
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);


        // if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
        //     return redirect()->route('home')->with('success', 'Registration successful! Welcome!');
        // }

        return redirect()->route('login.form')->with('success', 'Registration successful! Please log in.');
    }

    public function showRegistrationForm() {
        return view('user.register');
    }
}
