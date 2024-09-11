<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Destination;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Destination::create([
            'name' => fake()->unique()->city(),
            'country_id' => Country::where('name', 'Indonesia')->value('id'),
            'description' => fake()->text(200),
        ]);

        Destination::factory(10)->create();
    }
}
