<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

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

    public function messages():array
    {
        $locale = app()->getLocale();
        switch($locale)
        {
            case 'en':
                return $this->getEnglishMessages();
            case 'fr':
                return $this->getFrenchMessages();
            default:
                return $this->getEnglishMessages();
        }
 
    }
    public function getEnglishMessages(): array
    {
        return [
            'nameOfPrescription.required' => 'The name of the prescription is required',
            'dateOfPrescription.required' => 'The date of the prescription is required',
            'dateOfStart.required' => 'The date of start of the prescription is required',
            'durationOfPrescriptionInDays.required' => 'The duration of the prescription is required',
            'frequencyBetweenDosesInHours.required' => 'The frequency between doses is required',
            'frequencyPerDay.required' => 'The frequency per day is required',
            'medication_id.required' => 'The medication is required',
        ];
    }
    public function getFrenchMessages(): array
    {
        return [
            'nameOfPrescription.required' => 'Le nom de la prescription est requis',
            'dateOfPrescription.required' => 'La date de la prescription est requise',
            'dateOfStart.required' => 'La date de début de la prescription est requise',
            'durationOfPrescriptionInDays.required' => 'La durée de la prescription est requise',
            'frequencyBetweenDosesInHours.required' => 'La fréquence entre les doses est requise',
            'frequencyPerDay.required' => 'La fréquence par jour est requise',
            'medication_id.required' => 'Le médicament est requis',
        ];
    }
    
}
