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
            'dni' => fake()->randomLetter(),
            'first_name' => fake()->firstName(),
            'last_name_father' => fake()->regexify('[A-Za-z0-9]{100}'),
            'last_name_mother' => fake()->regexify('[A-Za-z0-9]{100}'),
            'academic_department' => fake()->regexify('[A-Za-z0-9]{255}'),
        ];
    }
}
