<?php

namespace App\Http\Requests\Admin\Specialty;
// namespace App\Http\Requests\Admin;

use App\Models\Specialty;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSpecialtyRequest extends FormRequest
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
        return array_merge(Specialty::ROLES, [
            'name' => 'required|max:50|min:3|unique:specialties,name,' . $this->specialty->id,
        ]);
    }
}
