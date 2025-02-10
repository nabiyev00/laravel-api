<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DeliveryMethodResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'name' => $this->getTranslations('name'),
            'estimated_time' => $this->estimated_time,
            'sum' => $this->sum,
            'created_at' => $this->created_at
        ];
    }
}
