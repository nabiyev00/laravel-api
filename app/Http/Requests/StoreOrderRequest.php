<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'delivery_method_id' => 'required|exists:delivery_methods,id',
            'payment_type_id' => 'required|exists:payment_types,id',
            'products' => 'required',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
            'comment' => 'nullable|string|max:255',
            'address' => 'nullable|max:255',
        ];
    }
}
