<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLogin()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin-dashboard');
        }

        return view("admin.index");
    }
    public function showDashboard()
    {
        if (Auth::guard('admin')->check())
            return view("admin.dashboard.dashboard");
        return view("admin.index");
    }
    public function adminLogin(Request $request)
    {
        $validate = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|string'
            ]
        );

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('admin-dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function adminLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('show.adminLogin');
    }
    public function showProducts()
    {
        if (Auth::guard('admin')->check())
            return view('admin.product.product');
        return view("admin.index");
    }
}
