<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name=$this->faker->name;
        return [
            "name" => $name,
            "slug" => Str::slug($name),
            "description" => $this->faker->sentence,
            "image" => $this->faker->imageUrl(),
            "status" => $this->faker->randomElement(["active", "drafted"]),
        ];
    }
}
