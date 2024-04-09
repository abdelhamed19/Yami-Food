<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            "name" => "Pizza",
            "slug" => "pizza",
            "description" => "Pizza is a savory dish of Italian origin consisting of a usually round, flattened base of leavened wheat-based dough topped with tomatoes, cheese, and often various other ingredients (such as anchovies, mushrooms, onions, olives, pineapple, meat, etc.) which is then baked at a high temperature, traditionally in a wood-fired oven.",
        ]);
        // Category 2
        Category::create([
            "name" => "Burgers",
            "slug" => "burgers",
            "description" => "Burgers are sandwiches consisting of one or more cooked patties of ground meat, usually beef, placed inside a sliced bread roll or bun.",
        ]);

        // Category 3
        Category::create([
            "name" => "Pasta",
            "slug" => "pasta",
            "description" => "Pasta is a staple food of Italian cuisine, made from unleavened dough of durum wheat flour mixed with water and formed into various shapes, then cooked and served in a number of dishes.",
        ]);

        // Category 4
        Category::create([
            "name" => "Seafood",
            "slug" => "seafood",
            "description" => "Seafood refers to any form of sea life regarded as food by humans, prominently including fish and shellfish.",
        ]);

        // Category 5
        Category::create([
            "name" => "Salads",
            "slug" => "salads",
            "description" => "Salads are dishes consisting of a mixture of small pieces of food, usually vegetables or fruit.",
        ]);

        // Category 6
        Category::create([
            "name" => "Sandwiches",
            "slug" => "sandwiches",
            "description" => "Sandwiches consist of two or more slices of bread with one or more fillings between them.",
        ]);

        // Category 7
        Category::create([
            "name" => "Desserts",
            "slug" => "desserts",
            "description" => "Desserts are sweet course typically including sweet foods, but may include other items.",
        ]);

        // Category 8
        Category::create([
            "name" => "Soups",
            "slug" => "soups",
            "description" => "Soups are a primarily liquid food, generally served warm or hot, that is made by combining ingredients of meat or vegetables with stock or water.",
        ]);

        // Category 9
        Category::create([
            "name" => "Steaks",
            "slug" => "steaks",
            "description" => "Steak is a meat generally sliced across the muscle fibers, potentially including a bone.",
        ]);

        // Category 10
        Category::create([
            "name" => "Drinks",
            "slug" => "drinks",
            "description" => "Drinks are liquids intended for human consumption. In addition to basic needs, drinks form part of the culture of human society.",
        ]);
    }
}
