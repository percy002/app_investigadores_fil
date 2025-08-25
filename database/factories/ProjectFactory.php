<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Project;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'code' => fake()->regexify('[A-Za-z0-9]{50}'),
            'title' => fake()->sentence(4),
            'research_line' => fake()->regexify('[A-Za-z0-9]{255}'),
            'research_area' => fake()->regexify('[A-Za-z0-9]{255}'),
            'status' => fake()->randomElement(["EN_PROCESO","FINALIZADO","SUSPENDIDO"]),
        ];
    }
}
