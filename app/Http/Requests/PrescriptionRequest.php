<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrescriptionRequest extends FormRequest
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
            'nameOfPrescription' => 'required|string|max:255',
            'dateOfPrescription' => 'required|date',
            'dateOfStart' => 'required|date',
            'durationOfPrescriptionInDays' => 'required|integer',
            'frequencyBetweenDosesInHours' => 'required|integer',
            /*Venir enlever frequencyPerDay par firstIntakeHour */
            'frequencyPerDay' => 'required|integer',
            'medication_id' => 'required|integer|exists:medications,id',
        ];
    }
    
}
