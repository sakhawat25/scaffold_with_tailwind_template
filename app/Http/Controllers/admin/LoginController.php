<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('admin.login');
    }

    public function authenticate(Request $request) {
        // Validation
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt([
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
        ])) {
            if (Auth::guard('admin')->user()->role === 2) {
                return redirect()->route('admin.dashboard')->with('success', 'Login successful');
            } else {
                Auth::guard('admin')->logout();
                return back()->with('error', 'You are not authorised to login');
            }
        }

        return back()->with('error', 'Invalid login credentials');
    }
}
