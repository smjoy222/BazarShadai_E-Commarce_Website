<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('user.home');
        }
        
        return view('home');
    }

    public function userDashboard()
    {
        $user = Auth::user();
        return view('user.dashboard', compact('user'));
    }
}
