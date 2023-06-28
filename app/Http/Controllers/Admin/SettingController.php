<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSettingRequest;

class SettingController extends Controller
{
    public  function index()
    {
        $settings = Setting::get();
        return view('Admin.Dashboard.settings', compact('settings'));
    }

    public function update(Setting $setting, UpdateSettingRequest $request)
    {
        $setting->update($request->validated());
        return redirect()->back()->with('success', 'Setting updated successfully');
    }
}
