<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeviceRequest extends FormRequest
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
            'noSerie' => 'required|string|unique:devices',
            'associatedPatientFullName' => 'required|string',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *With __() function, we can get the translated message
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'noSerie.required' => __('D_NS.required'),
            'noSerie.string' => __('D_NS.string'),
            'noSerie.unique' => __('D_NS.unique'),
            'associatedPatientFullName.required' => __('D_APFN.required'),
            'associatedPatientFullName.string' => __('D_APFN.string'),
        ];
    }
    

}
