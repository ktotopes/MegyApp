<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InfoTheDeceased>
 */
class InfoTheDeceasedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'photo' => $this->faker->imageUrl(640, 480, 'animals', true),
            'title' => $this->faker->title,
            'dateDeath' => $this->faker->date(),
            'dateBirthday' => $this->faker->date(),
            'description' => $this->faker->text(),
            'coordinates' => $this->faker->address,
        ];
    }
}
