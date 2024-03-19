<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlertRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            
            'isTheMedicationTaken' => 'required|boolean',

        ];

    }

    public function messages(): array
    {
        return [
            'isTheMedicationTaken.required' => __('A_IMT.required',[], $this->getLocale()),
            'isTheMedicationTaken.boolean' => __('A_IMT.boolean',[], $this->getLocale()),
        ];
    }
}
