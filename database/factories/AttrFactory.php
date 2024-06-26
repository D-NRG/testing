<?php

namespace Database\Factories;

use App\Models\Categories;
use App\Models\Color;
use App\Models\Manufacture;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attr>
 */
class AttrFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'color_id' => Color::get()->random()->id,
            'size_id' => Size::get()->random()->id,
            'manufacture_id' => Manufacture::get()->random()->id,
            'product_id' => Product::get()->random()->id,
            'categories_id' => Categories::get()->random()->id,
        ];
    }
}
