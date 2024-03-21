<?php

namespace Database\Factories;

use App\Models\InfoTheDeceased;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Deceased>
 */
class DeceasedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fio' => $this->faker->name,
            'slug' => $this->faker->slug,
            'info_the_deceased_id' => InfoTheDeceased::query()->inRandomOrder()->first()?->id
        ];
    }
}
