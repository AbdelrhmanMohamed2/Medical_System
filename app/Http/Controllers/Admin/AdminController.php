<?php

namespace App\Http\Controllers\Admin;

use App\Models\{User, Admin};
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Admin\{StoreAdminRequest, UpdateAdminRequest};

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = User::where('type', 'admin')->paginate();
        return view('Admin.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request)
    {
        User::create($request->validated() + ['type' => 'admin']);
        return redirect()->back()->with('success', 'Admin Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    // public function show(User $user)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('Admin.admins.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, User $user)
    {
        $validated_data = $request->validated();
        if (is_null($validated_data['password'])) {
            unset($validated_data['password']);
            unset($validated_data['password_confirmation']);
        }
        $user->update($validated_data);
        return redirect()->back()->with('success', 'Admin Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'Admin Delete Successfully');
    }
}
