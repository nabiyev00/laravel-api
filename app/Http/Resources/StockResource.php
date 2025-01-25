<?php

namespace App\Http\Resources;

use App\Models\Attribute;
use App\Models\Value;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StockResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $result = [
            'stock_id' => $this->id,
            'quantity' => $this->quantity,
        ];

        return $this->getAttributes($result);
    }

    public function getAttributes(array $result): array
    {
        $attributes = json_decode($this->attributes, true);
        foreach ($attributes as $stockAttribute) {
            $attribute = Attribute::find($stockAttribute['attribute_id']);
            $value = Value::find($stockAttribute['value_id']);

            if ($attribute && $value) {
                $result[strtolower($attribute->name)] = $value->getTranslations('name');
            } else {
                $result[strtolower($attribute->name)] = null;  // Handle missing value gracefully
            }
        }

        return $result;
    }
}
