<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Participation;
use App\Models\Project;
use App\Models\Researcher;

class ParticipationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Participation::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'project_id' => Project::factory(),
            'researcher_id' => Researcher::factory(),
            'role' => fake()->randomElement(["INVESTIGADOR_PRINCIPAL","COINVESTIGADOR","ASISTENTE"]),
            'status' => fake()->randomElement(["ACTIVO","INACTIVO"]),
        ];
    }
}
