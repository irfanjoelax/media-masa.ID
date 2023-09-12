<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = ['Tentang Kami', 'Redaksi', 'Kode Etik', 'Kontak', 'Pedoman Media Siber'];

        foreach ($datas as $item) {
            Page::create([
                'title' => $item,
                'slug' => str()->slug($item),
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex nam magnam placeat eum. Earum, obcaecati. Velit voluptatibus maxime ullam accusantium magnam mollitia quo, dolorem eos ad animi expedita eveniet quasi.'
            ]);
        }
    }
}
