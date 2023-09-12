<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Administrator User',
            'email' => 'admin@admin.com',
        ]);

        $this->call([CategorySeeder::class]);
        $this->call([SosialMediaSeeder::class]);
        $this->call([PageSeeder::class]);
    }
}
