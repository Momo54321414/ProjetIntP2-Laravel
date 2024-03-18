<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AlertsResource extends JsonResource
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
            'attributes'=>[
            
            'isTheMedicationTaken' => $this->isTheMedicationTaken,
  
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
            ],
            'joins' =>[
                'calendar_id' => $this->calendar_id,
                'dateOfIntake' => $this->dateOfIntake,
                'hourOfIntake' => $this->hourOfIntake,
                'medicationName' => $this->medicationName,
            ]
        ];
    }
}
