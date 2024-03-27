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
            'alerts' => [ // 'alerts' is the key that will be used in the JSON response to represent the alert object
                'id' => (string) $this->id,
                'attributes' => [
                    'isTheMedicationTaken' => $this->isTheMedicationTaken,
                    'createdAt' => $this->created_at,
                    'updatedAt' => $this->updated_at,
                ],
                'calendars' => [
                    'calendar_id' => $this->calendar_id,
                ]
            ]
        ];
    }
}
