<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Display the dashboard (for authenticated users)
     */
    public function dashboard()
    {
        return view('dashboard');
    }
}
