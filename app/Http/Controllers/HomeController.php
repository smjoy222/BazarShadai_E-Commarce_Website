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
     * Display the vegetables page
     */
    public function vegetables()
    {
        return view('vegetables'); // Make sure this matches your blade file name
    }

    /**
     * Display the dashboard (for authenticated users)
     */
    public function dashboard()
    {
        return view('dashboard');
    }
}
