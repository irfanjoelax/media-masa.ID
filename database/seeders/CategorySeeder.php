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
            'Advertorial', 'Nasional', 'Politik', 'Ekonomi Bisnis', 'Opini', 'Agama'
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'slug' => str()->slug($category)
            ]);
        }
    }
}
