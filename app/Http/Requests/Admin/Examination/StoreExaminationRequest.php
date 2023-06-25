<?php

namespace App\Http\Requests\Admin\Examination;

// namespace App\Http\Requests;

use App\Models\Examination;
use Illuminate\Foundation\Http\FormRequest;

class StoreExaminationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->type === 'Doctor';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return array_merge(Examination::roles(), [
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
        ]);
    }

    public function prepareForValidation()
    {
        if (auth()->user()->type === 'Doctor') {
            $this->merge([
                'doctor_id' => auth()->user()->doctor->id,
            ]);
        }
    }
}
