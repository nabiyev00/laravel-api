<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'payment_type' => $this->paymentType,
            'delivery_method' => $this->deliveryMethod,
            'comment' => $this->comment,
            'sum' => $this->sum,
            'status' => $this->status,
            'user' => $this->user,
            'products' => $this->products,
            'address' => $this->address,
        ];
    }
}
