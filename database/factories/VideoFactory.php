<?php

namespace Database\Factories;

use App\Models\Block;
use App\Models\Deceased;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'path' => $this->faker->imageUrl(640, 480),
            'entity_id' =>  Block::inRandomOrder()->first()?->id ?? Deceased::factory(),
            'entity_type' => Block::class
        ];
    }

    public function withBlock(Block $block): static
    {
        return $this->state(fn(array $attributes) => [
            'entity_id' => $block->id,
        ]);
    }
}
