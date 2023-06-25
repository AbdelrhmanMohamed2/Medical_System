<?php
namespace App\Http\Requests\Admin\Admin;


use Illuminate\Foundation\Http\FormRequest;

class StoreAdminRequest extends FormRequest
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
            'phone' => 'required|unique:users,phone',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ];
    }
}
