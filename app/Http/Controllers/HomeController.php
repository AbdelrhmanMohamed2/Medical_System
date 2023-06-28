<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Setting;
use App\Models\Specialty;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key');
        $specialties = Specialty::get();
        $doctors = Doctor::with(['specialty', 'user'])->get();
        return view('end_user.index', compact('settings', 'specialties', 'doctors'));
    }
}
