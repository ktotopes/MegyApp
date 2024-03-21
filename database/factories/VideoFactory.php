<?php

namespace Database\Factories;

use App\Models\InfoTheDeceased;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'path' => $this->faker->imageUrl(640, 480, 'animals', true),
            'videoable_id' =>InfoTheDeceased::factory()->create()->id,
            'videoable_type' =>InfoTheDeceased::class,
        ];
    }
}
