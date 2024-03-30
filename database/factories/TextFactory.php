<?php

namespace Database\Factories;

use App\Models\Block;
use App\Models\Deceased;
use Illuminate\Database\Eloquent\Factories\Factory;

class TextFactory extends Factory
{
    public function definition(): array
    {
        return [
            'text' => $this->faker->text(),
            'entity_id' => Block::inRandomOrder()->first()?->id ?? Deceased::factory(),
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
