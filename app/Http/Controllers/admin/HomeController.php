<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        return view('admin.dashboard');
    }

    public function logout() {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login')->with('success', 'Logout successful');
    }

    public function bgColor() {
        return view('admin.pages.bg-color');
    }

    public function typography() {
        return view('admin.pages.typography');
    }

    public function icons() {
        return view('admin.pages.icons');
    }

    public function loginv1() {
        return view('admin.pages.login');
    }

    public function registerv1() {
        return view('admin.pages.register');
    }
}
