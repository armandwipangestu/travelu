<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Country>
 */
class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Generate a unique country name, but filter out "Indonesia"
        do {
            $countryName = fake()->unique()->country();
        } while ($countryName === 'Indonesia');

        return [
            'name' => $countryName,
        ];
    }
}
