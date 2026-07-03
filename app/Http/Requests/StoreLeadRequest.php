<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLeadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'fullName' => 'nullable|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'serviceType' => 'nullable|string',
            'urgency' => 'nullable|string',
            'jobDescription' => 'nullable|string',
            'budget' => 'nullable|string|max:255',
            'companyWebsite' => 'nullable|string|max:255',
            'disclaimer' => 'required|accepted',
            'fileUpload' => 'nullable|array',
            'fileUpload.*' => 'file|mimes:jpg,jpeg,png,mp4,mov,avi|max:250600', // ~250MB
        ];
    }
}
