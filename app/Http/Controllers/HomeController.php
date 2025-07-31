<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::guard('web')->check()) {
            return redirect()->route('user.home');
        }

        // Fetch only featured products for home page
        $featuredProducts = Product::where('featured', true)
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
        $user = Auth::guard('web')->user();

        // For dashboard, show only featured products
        $featuredProducts = Product::where('featured', true)
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
