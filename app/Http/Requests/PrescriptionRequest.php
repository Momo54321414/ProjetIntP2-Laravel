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
        return [
            'nameOfPrescription.required' => __('P_NOP.required',[],[], $this->getLocale()),
            'nameOfPrescription.string' => __('P_NOP.string',[],[], $this->getLocale()),
            'nameOfPrescription.max' => __('P_NOP.max',[],[], $this->getLocale()),
            'dateOfPrescription.required' => __('P_DOP.required',[],[], $this->getLocale()),
            'dateOfPrescription.date_format' => __('P_DOP.date_format',[],$this->getLocale()),
            'dateOfStart.required' => __('P_DOS.required',[],$this->getLocale()),
            'dateOfStart.date_format' => __('P_DOS.date_format',[],$this->getLocale()),
            'durationOfPrescriptionInDays.required' => __('P_DOPID.required',[],$this->getLocale()),
            'durationOfPrescriptionInDays.integer' => __('P_DOPID.integer',[],$this->getLocale()),
            'frequencyBetweenDosesInHours.required' => __('P_FBDIH.required',[],$this->getLocale()),
            'frequencyBetweenDosesInHours.integer' => __('P_FBDIH.integer',[],$this->getLocale()),
            'frequencyOfIntakeInDays.required' => __('P_FOIID.required',[],$this->getLocale()),
            'frequencyOfIntakeInDays.integer' => __('P_FOIID.integer',[],$this->getLocale()),
            'firstIntakeHour.required' => __('P_FIH.required',[],$this->getLocale()),
            'firstIntakeHour.date_format' => __('P_FIH.date_format',[],$this->getLocale()),
            'medication_id.required' => __('P_M.required',[],$this->getLocale()),
            'medication_id.integer' => __('P_M.integer',[],$this->getLocale()),
        ];
    }
}
