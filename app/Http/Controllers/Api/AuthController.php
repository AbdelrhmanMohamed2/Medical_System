<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\Admin\Dashboard\LoginRequest;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use ApiTrait;

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken('token_name')->plainTextToken;
        return $this->apiResponse(message: 'Login successfully', data: ['token' => $token]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return $this->apiResponse(message: 'Logout successfully');
    }
}
