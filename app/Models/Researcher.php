<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Researcher extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'apellidos_nombres',
        'genero',
        'documento_de_identidad',
        'pais_nacimiento',
        'fecha_nacimiento',
        'correo_institucional',
        'facultad_escuela',
        'categoria_docente',
        'tipo_contrato',
        'codigo_renacyt',
        'orcid',
        'tipo_ocupacion',
        'cti_vitae',
        'produccion_cientifica',
        'proyectos_investigacion',
        'linea_investigacion',
        'contacto_academico',
        'resumen_bibliografia',
        'status',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'fecha_nacimiento' => 'date',
            'produccion_cientifica' => 'array',
            'proyectos_investigacion' => 'array',
            'linea_investigacion' => 'array',
            'contacto_academico' => 'array',
        ];
    }
}
