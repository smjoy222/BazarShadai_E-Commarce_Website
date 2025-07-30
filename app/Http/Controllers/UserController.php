<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Auth;
use Hash;


class UserController extends Controller
{
    public function createUser(Request $request)
    {
        // Create the user
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);


        // if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
        //     return redirect()->route('home')->with('success', 'Registration successful! Welcome!');
        // }
        Auth::login($user);
        return redirect()->route('login.form')->with('success', 'Registration successful! Please log in.');
    }


    public function userLogin(Request $request)
    {
        $ulogin = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($ulogin)) {
            $request->session()->regenerate();
            return redirect()->route('home')->with('success', 'Login successful! Welcome back!');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid email or password.'])->withInput();
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string|max:500',
        ]);

        // Update the user
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'date_of_birth' => $request->date_of_birth,
            'address' => $request->address,
        ]);

        return redirect()->route('user.profile')->with('success', 'Profile updated successfully!');
    }

    // public function orders() {
    //     $user = Auth::user();
    //     // You can add logic to get user orders here
    //     return view('user.orders', compact('user'));
    // }



    public function settings()
    {
        $user = Auth::user();
        return view('user.settings', compact('user'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Check if current password is correct
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        // Update password
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->route('user.settings')->with('success', 'Password updated successfully!');
    }

    public function deleteAccount(Request $request)
    {
        $request->validate([
            'confirm_password' => 'required',
        ]);

        $user = Auth::user();

        // Check if password is correct
        if (!Hash::check($request->confirm_password, $user->password)) {
            return redirect()->back()->withErrors(['confirm_password' => 'The password is incorrect.']);
        }

        // Delete the user account
        $user->delete();

        // Logout and redirect
        Session::flush();
        Auth::logout();

        return redirect('/')->with('success', 'Your account has been successfully deleted.');
    }
}
