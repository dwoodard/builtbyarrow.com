<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:150'],
            'phone' => ['required', 'string', 'regex:/^[\d\s\-\+\(\)]{10,}$/'],
            'preferred_days' => ['nullable', 'array'],
            'preferred_days.*' => ['string', 'in:mon,tue,wed,thu,fri,sat,sun'],
            'best_time' => ['nullable', 'string', 'in:morning,afternoon,evening'],
            'details' => ['nullable', 'string', 'max:1000'],
        ];
    }
}
