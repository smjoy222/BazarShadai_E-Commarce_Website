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
   

    public function userLogin (Request $request) {
        $ulogin = $request->only('email', 'password');

        if (Auth::attempt($ulogin)) {
            return redirect()->route('user.home')->with('success', 'Login successful! Welcome back!');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid email or password.'])->withInput();
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
