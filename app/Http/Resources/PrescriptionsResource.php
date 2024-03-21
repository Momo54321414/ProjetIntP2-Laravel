<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PrescriptionsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => (string) $this->id,
            'attributes' => [
                'nameOfPrescription' => $this->nameOfPrescription,
                'dateOfPrescription' => $this->dateOfPrescription,
                'dateOfStart' => $this->dateOfStart,
                'durationOfPrescriptionInDays' => $this->durationOfPrescriptionInDays,
                'frequencyBetweenDosesInHours' => $this->frequencyBetweenDosesInHours,
                'frequencyPerDay' => $this->frequencyPerDay,
                'firstIntakeHour' => $this->firstIntakeHour,
                'frequencyOfIntakeInDays' => $this->frequencyOfIntakeInDays,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ],
            'medications' => [
                'medicationId' => $this->medicationId,
                'medicationName' => $this->medicationName,
                'medicationFunction' => $this->medicationFunction,
                'medicationcanBeInPillBox' => $this->medicationcanBeInPillBox,
            ],
            'user' => [
                'user_id' => $this->user_id,
            ]



        ];
    }
}
