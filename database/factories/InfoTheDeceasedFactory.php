<?php

namespace Database\Factories;

use App\Models\InfoTheDeceased;
use App\Models\User;
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
            'background_img' => $this->faker->imageUrl(640, 480, 'animals', true),
            'fio' => $this->faker->name,
            'slug' => $this->faker->slug,
            'photo' => $this->faker->imageUrl(640, 480, 'animals', true),
            'title' => $this->faker->title,
            'date_death' => $this->faker->date(),
            'date_birthday' => $this->faker->date(),
            'coordinates' => $this->faker->address,
        ];
    }
}
