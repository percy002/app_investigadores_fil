<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParticipationUpdateRequest extends FormRequest
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
            'project_id' => ['required', 'integer', 'exists:projects.id,id'],
            'researcher_id' => ['required', 'integer', 'exists:researchers.id,id'],
            'role' => ['required', 'in:INVESTIGADOR_PRINCIPAL,COINVESTIGADOR,ASISTENTE'],
            'status' => ['required', 'in:ACTIVO,INACTIVO'],
        ];
    }
}
