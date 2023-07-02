<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Traits\ApiTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Admin\{StoreAdminRequest, UpdateAdminRequest};

class AdminController extends Controller
{

    use ApiTrait;

    public function index()
    {
        $admins = User::where('type', 'admin')->paginate();
        return $this->apiResponse(data: $admins);
    }

    public function store(StoreAdminRequest $request)
    {
        $admin = User::create($request->validated() + ['type' => 'admin']);
        return $this->apiResponse(data: $admin, message: 'Admin Added Successfully');
    }

    public function show(User $user)
    {
        return $this->apiResponse(data: $user);
    }

    public function update(UpdateAdminRequest $request, User $user)
    {
        $validated_data = $request->validated();
        if (isset($validated_data['password']) && is_null($validated_data['password'])) {
            unset($validated_data['password']);
            unset($validated_data['password_confirmation']);
        }
        $user->update($validated_data);
        return $this->apiResponse(data: $user, message: 'Admin Updated Successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return $this->apiResponse(message: 'Admin Deleted Successfully');
    }
}
