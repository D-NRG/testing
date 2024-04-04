<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Color::create(['color'=>'Белый']);
        Color::create(['color'=>'Черный']);
        Color::create(['color'=>'Красный']);
        Color::create(['color'=>'Синий']);
        Color::create(['color'=>'Оранжевый']);
        Color::create(['color'=>'Фиолетовый']);
        Color::create(['color'=>'Желтый']);
    }
}
