<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->name;
        return [
            "name" => $name,
            "slug" => Str::slug($name),
            "category_id" => $this->faker->numberBetween(1, 10),
            "description" => $this->faker->sentence,
            "image" => $this->faker->imageUrl(),
            "price" => $this->faker->randomFloat(2, 1, 100),
            "status" => $this->faker->randomElement(["active", "drafted"]),
        ];
    }
}
