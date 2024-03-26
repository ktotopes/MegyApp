<?php

namespace Database\Factories;

use App\Models\InfoTheDeceased;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'path' => $this->faker->imageUrl(640, 480),
            'description' => $this->faker->sentence(),
            'imageable_id' => InfoTheDeceased::factory(),
            'imageable_type' => InfoTheDeceased::class,
        ];
    }
}
