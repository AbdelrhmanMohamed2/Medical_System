<?php

namespace App\Http\Requests\Admin\Doctor;


use App\Models\Doctor;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDoctorRequest extends FormRequest
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
        return array_merge(
            Doctor::roles(),
            [
                'phone' => 'required|unique:users,phone,' . $this->doctor->user->id,
                'email' => 'required|email|unique:users,email,' . $this->doctor->user->id,
                'image' => 'nullable|image|mimes:png,jpg',
                'password' => 'nullable|min:6|confirmed',
                'password_confirmation' => 'nullable|required_with:password',
            ]
        );
    }

    public function prepareForValidation()
    {
        $this->merge([
            'specialty_id' => $this->specialty,
        ]);
    }
}
