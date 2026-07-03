<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompleteLeadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'session_token' => 'required|string',
            'fullName' => 'nullable|string|max:255',
            'companyWebsite' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'fileUpload' => 'nullable|array',
            'fileUpload.*' => 'file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx,mp4,mov,avi|max:250600',
        ];
    }
}
