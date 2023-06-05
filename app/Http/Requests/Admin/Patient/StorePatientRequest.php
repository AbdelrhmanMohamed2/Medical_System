<?php
namespace App\Http\Requests\Admin\Patient;


use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
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
        return [
            'name' => 'required|max:50|min:5',
            'address' => 'nullable|min:3|max:50',
            'phone' => 'required|unique:users,phone',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
            'image' => 'nullable|image|mimes:png,jpg',
            'birth_date' => 'required|date|before_or_equal:'. now()->format('Y-m-d'),
        ];
    }
}
