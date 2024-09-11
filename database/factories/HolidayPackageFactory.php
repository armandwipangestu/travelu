<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Destination;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HolidayPackage>
 */
class HolidayPackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $available_from = fake()->dateTimeBetween('-1 years', 'now');
        $available_to = fake()->dateTimeBetween($available_from, '+1 years');

        return [
            'category_id' => Category::inRandomOrder()->value('id'),
            'title' => fake()->unique()->text(30),
            'description' => fake()->text(100),
            'price' => fake()->randomFloat(2, 100, 10000),
            'destination_id' => Destination::inRandomOrder()->value('id'),
            'available_from' => $available_from->format('Y-m-d'),
            'available_to' => $available_to->format('Y-m-d'),
        ];
    }
}
