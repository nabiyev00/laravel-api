<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserAddressRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'latitude' => ['required', 'numeric', 'min:-90', 'max:90'],
            'longitude' => ['required', 'numeric', 'min:-180', 'max:180'],
            'region' => ['required', 'string'],
            'district' => ['required', 'string'],
            'street' => ['required', 'string'],
            'home' => ['required', 'string', 'nullable'],
        ];
    }
}
