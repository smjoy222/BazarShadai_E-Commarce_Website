<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('user.home');
        }
        
        // Fetch featured products with variety (mix from different categories)
        $featuredProducts = Product::select('*')
            ->orderByRaw('CASE 
                WHEN category = "fruits" THEN 1
                WHEN category = "veg" THEN 2
                WHEN category = "meats" THEN 3
                WHEN category = "dairy" THEN 4
                WHEN category = "sea-food" THEN 5
                WHEN category = "fish" THEN 6
                ELSE 7
            END')
            ->limit(8)
            ->get();
        
        return view('home', compact('featuredProducts'));
    }

    public function userDashboard()
    {
        $user = Auth::user();
        
        // For dashboard, show personalized products (can be enhanced with user preferences)
        $featuredProducts = Product::select('*')
            ->orderByRaw('CASE 
                WHEN category = "fruits" THEN 1
                WHEN category = "veg" THEN 2
                WHEN category = "meats" THEN 3
                WHEN category = "dairy" THEN 4
                WHEN category = "sea-food" THEN 5
                WHEN category = "fish" THEN 6
                ELSE 7
            END')
            ->limit(8)
            ->get();
        
        return view('user.dashboard', compact('user', 'featuredProducts'));
    }
}
