<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\Dashboard\LoginRequest;

class LoginDashboardController extends Controller
{
    // public function index()
    // {
    //     return view('Admin.Dashboard.login');
    // }

    // public function login(LoginRequest $request)
    // {
    //     $request->authentication();

    //     if(auth()->user() && in_array(auth()->user()->type, ['Admin', 'Doctor'])){
    //         toast('Welcome, Login successful', 'success');
    //         return redirect()->route('admin.dashboard.index');
    //     }
    //     toast('invalid credentials', 'error');
    //     return redirect()->back();
    // }

    // public function logout(Request $request)
    // {
    //     Auth::logout();

    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();

    //     return redirect()->back();
    // }
}
