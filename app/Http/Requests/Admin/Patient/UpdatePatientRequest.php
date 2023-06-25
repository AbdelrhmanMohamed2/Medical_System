<?php

namespace App\Http\Requests\Admin\Patient;

use App\Models\Patient;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return array_merge([
            'phone' => 'required|unique:users,phone,' . $this->patient->user->id,
            'password' => 'nullable|min:6|confirmed',
            'password_confirmation' => 'required_with:password',
        ], Patient::roles());
    }
}
