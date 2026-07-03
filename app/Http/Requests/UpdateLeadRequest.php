<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLeadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'session_token' => 'required|string',
            'serviceType' => 'nullable|string',
            'jobDescription' => 'nullable|string',
            'budget' => 'nullable|string',
        ];
    }
}
