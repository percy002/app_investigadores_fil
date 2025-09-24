<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Researcher;

class ResearcherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Researcher::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'apellidos_nombres' => fake()->word(),
            'genero' => fake()->randomElement(["Masculino","Femenino","Otro"]),
            'documento_de_identidad' => fake()->word(),
            'pais_nacimiento' => fake()->word(),
            'fecha_nacimiento' => fake()->date(),
            'correo_institucional' => fake()->word(),
            'facultad_escuela' => fake()->word(),
            'categoria_docente' => fake()->word(),
            'tipo_contrato' => fake()->word(),
            'codigo_renacyt' => fake()->word(),
            'orcid' => fake()->word(),
            'tipo_ocupacion' => fake()->word(),
            'cti_vitae' => fake()->word(),
            'produccion_cientifica' => '{}',
            'proyectos_investigacion' => '{}',
            'linea_investigacion' => '{}',
            'contacto_academico' => '{}',
            'resumen_bibliografia' => fake()->text(),
            'status' => fake()->randomElement(["activo","inactivo"]),
        ];
    }
}
