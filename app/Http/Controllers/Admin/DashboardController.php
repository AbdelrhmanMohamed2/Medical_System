<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\{Examination, User, Specialty};


class DashboardController extends Controller
{
    public function index()
    {
        $counts = User::query()
        ->select('type', DB::raw('count(*) as count'))
        ->groupBy('type')
        ->get();

        // dd($counts[0], $counts[1], $counts[2]);
        // $adminCount = User::where('type', 'admin')->count();
        // $doctorCount = User::where('type', 'doctor')->count();
        // $patientCount = User::where('type', 'patient')->count();
        $adminCount = $counts[0]->count;
        $doctorCount = $counts[1]->count;
        $patientCount = $counts[2]->count;
        $specialtyCount = Specialty::count();
        $revenue = Examination::selectRaw('SUM(price) as total_price, SUM(price * offer / 100) as total_offer')->get();
        $totalPrice = $revenue[0]->total_price;
        // $totalPrice = Examination::sum('price');

        return view('Admin.Dashboard.index', compact('doctorCount', 'adminCount', 'patientCount', 'specialtyCount', 'revenue'));
    }
}
