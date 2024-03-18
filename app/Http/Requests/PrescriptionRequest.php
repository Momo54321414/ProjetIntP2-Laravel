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
            'dateOfPrescription' => 'required|date_format:Y-m-d',
            'dateOfStart' => 'required|date_format:Y-m-d',
            'durationOfPrescriptionInDays' => 'required|integer',
            'frequencyBetweenDosesInHours' => 'required|integer',
            'frequencyOfIntakeInDays' => 'required|integer',
            'firstIntakeHour' => 'required|date_format:H:i',
            'medication_id' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        $locale = app()->getLocale();
        switch ($locale) {
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
            'nameOfPrescription.string' => 'The name of the prescription must be a string',
            'nameOfPrescription.max' => 'The name of the prescription must not exceed 255 characters',
            'dateOfPrescription.required' => 'The date of the prescription is required',
            'dateOfPrescription' => 'The date of the prescription must be a date',
            'dateOfStart.required' => 'The date of start is required',
            'dateOfStart' => 'The date of start must be a date',
            'durationOfPrescriptionInDays.required' => 'The duration of the prescription in days is required',
            'durationOfPrescriptionInDays.integer' => 'The duration of the prescription in days must be an number',
            'frequencyBetweenDosesInHours.required' => 'The frequency between doses in hours is required',
            'frequencyBetweenDosesInHours.integer' => 'The frequency between doses in hours must be an number',
            'frequencyOfIntakeInDays.required' => 'The frequency of intake in days is required',
            'frequencyOfIntakeInDays.integer' => 'The frequency of intake in days must be an number',
            'firstIntakeHour.required' => 'The first intake hour is required',
            'firstIntakeHour.date_format' => 'The first intake hour must be a time format (HH:MM)',
            'medication_id.required' => 'The medication is required',
        ];
    }
    public function getFrenchMessages(): array
    {
        return [
            'nameOfPrescription.required' => 'Le nom de la prescription est requis',
            'nameOfPrescription.string' => 'Le nom de la prescription doit être une chaîne de caractères',
            'nameOfPrescription.max' => 'Le nom de la prescription ne doit pas dépasser 255 caractères',
            'dateOfPrescription.required' => 'La date de la prescription est requise',
            'dateOfPrescription' => 'La date de la prescription doit être une date',
            'dateOfStart.required' => 'La date de début est requise',
            'dateOfStart' => 'La date de début doit être une date',
            'durationOfPrescriptionInDays.required' => 'La durée de la prescription en jours est requise',
            'durationOfPrescriptionInDays.integer' => 'La durée de la prescription en jours doit être un nombre',
            'frequencyBetweenDosesInHours.required' => 'La fréquence entre les doses en heures est requise',
            'frequencyBetweenDosesInHours.integer' => 'La fréquence entre les doses en heures doit être un nombre',
            'frequencyOfIntakeInDays.required' => 'La fréquence de prise en jours est requise',
            'frequencyOfIntakeInDays.integer' => 'La fréquence de prise en jours doit être un nombre',
            'firstIntakeHour.required' => 'La première heure de prise est requise',
            'firstIntakeHour.date_format' => 'La première heure de prise doit être au format heure (H:i:s)',
            'medication_id.required' => 'Le médicament est requis',
        ];
    }
}
