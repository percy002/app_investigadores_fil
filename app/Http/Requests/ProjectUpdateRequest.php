<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectUpdateRequest extends FormRequest
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
            'code' => ['required', 'string', 'max:50', 'unique:projects,code'],
            'title' => ['required', 'string', 'max:255'],
            'research_line' => ['required', 'string', 'max:255'],
            'research_area' => ['required', 'string', 'max:255'],
            'status' => ['required', 'in:EN_PROCESO,FINALIZADO,SUSPENDIDO'],
        ];
    }
}
