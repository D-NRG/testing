<?php

namespace Database\Seeders;

use App\Models\Attr;
use App\Models\Categories;
use App\Models\Color;
use App\Models\Manufacture;
use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Attr::create([
            'color_id'=>Color::get()->random()->id,
            'size_id'=>Size::get()->random()->size_id,
            'manufacture_id'=>Manufacture::get()->random()->id,
//            'categories_id'=>Categories::get()->random()->id,
            'product_id'=>'1']);
        Attr::create([
            'color_id'=>Color::get()->random()->id,
            'size_id'=>Size::get()->random()->size_id,
            'manufacture_id'=>Manufacture::get()->random()->id,
//            'categories_id'=>Categories::get()->random()->id,
            'product_id'=>'1']);
        Attr::create([
            'color_id'=>Color::get()->random()->id,
            'size_id'=>Size::get()->random()->size_id,
            'manufacture_id'=>Manufacture::get()->random()->id,
//            'categories_id'=>Categories::get()->random()->id,
            'product_id'=>'2']);
        Attr::create([
            'color_id'=>Color::get()->random()->id,
            'size_id'=>Size::get()->random()->size_id,
            'manufacture_id'=>Manufacture::get()->random()->id,
//            'categories_id'=>Categories::get()->random()->id,
            'product_id'=>'3']);
    }
}
