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
        $categories = [
            'Adventure',
            'Relaxation',
            'Cultural',
            'Family',
            'Romantic',
            'Nature',
            'Beach',
            'Luxury',
            'Budget',
            'Wildlife',
            'City Tour',
            'Cruise',
            'Ecotourism',
            'Hiking & Trekking',
            'Pilgrimage'
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category
            ]);
        };

        // Category::factory(10)->create();
    }
}
