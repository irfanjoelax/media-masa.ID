<?php

namespace Database\Seeders;

use App\Models\SosialMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SosialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = ['Facebook', 'Instagram', 'Youtube', 'Whatsapp', 'Email'];

        foreach ($datas as $item) {
            SosialMedia::create([
                'key' => $item,
                'value' => '#',
            ]);
        }
    }
}
