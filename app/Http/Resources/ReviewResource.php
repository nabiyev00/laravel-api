<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'rating' => $this->rating,
            'product_id' => $this->product_id,
            'body' => $this->body,
            'user' => $this->user,
            'created_at' => $this->created_at
        ];
    }
}
