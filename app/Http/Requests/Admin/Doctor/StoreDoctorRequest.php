<?php

namespace App\Http\Requests\Admin\Doctor;


use App\Models\Doctor;
use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorRequest extends FormRequest
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
                'phone' => 'required|unique:users,phone',
                'email' => 'required|email|unique:users,email',
                'image' => 'required|image|mimes:png,jpg',
                'password' => 'required|min:6|confirmed',
                'password_confirmation' => 'required',
            ]
        );
    }

    public function prepareForValidation()
    {
        $this->merge(['specialty_id' => $this->specialty]);
    }
}
