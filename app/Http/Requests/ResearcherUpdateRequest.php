<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResearcherUpdateRequest extends FormRequest
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
            'dni' => ['required', 'string', 'max:8', 'unique:researchers,dni'],
            'first_name' => ['required', 'string', 'max:100'],
            'last_name_father' => ['required', 'string', 'max:100'],
            'last_name_mother' => ['required', 'string', 'max:100'],
            'academic_department' => ['nullable', 'string', 'max:255'],
        ];
    }
}
