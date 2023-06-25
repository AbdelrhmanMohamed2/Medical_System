<?php

namespace App\Http\Controllers\Admin;

use App\Models\{User, Specialty};
use App\Http\Controllers\Controller;


class DashboardController extends Controller
{
    public function index()
    {
        $adminCount = User::where('type', 'admin')->count();
        $doctorCount = User::where('type', 'doctor')->count();
        $patientCount = User::where('type', 'patient')->count();
        $specialtyCount = Specialty::count();

        return view('Admin.Dashboard.index', compact('doctorCount', 'adminCount', 'patientCount', 'specialtyCount'));
    }


}
