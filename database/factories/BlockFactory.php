<?php

namespace Database\Factories;

use App\Enum\BlocksType;
use App\Models\Block;
use App\Models\Deceased;
use App\Models\Image;
use App\Models\Text;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlockFactory extends Factory
{
    public function configure(): static
    {
        return $this->afterCreating(function (Block $block) {
            match ($block->type) {
                BlocksType::Text => Text::factory(2)->withBlock($block)->create(),
                BlocksType::Image => Image::factory(8)->withBlock($block)->create(),
                BlocksType::Video => Video::factory(3)->withBlock($block)->create(),
            };
        });
    }


    public function definition(): array
    {
        return [
            'deceased_id' => Deceased::inRandomOrder()->first()->id ?? Deceased::factory(),
            'type' => $this->faker->randomElement(BlocksType::cases()),
        ];
    }

    public function withDeceased(Deceased $deceased): static
    {
        return $this->state(fn(array $attributes) => [
            'deceased_id' => $deceased->id,
        ]);
    }
}
