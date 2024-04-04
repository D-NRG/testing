<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Attr;
use App\Models\Categories;
use App\Models\Category;
use App\Models\Color;
use App\Models\Manufacture;
use App\Models\Product;
use App\Models\Size;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//       $this->call(ColorSeeder::class);
//       $this->call(CategoriesSeeder::class);
//       $this->call(ManufactureSeeder::class);
//       $this->call(SizeSeeder::class);
//       $this->call(AttrSeeder::class);
//       $this->call(ProductSeeder::class);
        Color::factory(10)->create();
        Size::factory(10)->create();
        Manufacture::factory(10)->create();
        Categories::factory(10)->create();
        Product::factory(10)->create();
        Attr::factory(10)->create();
        User::factory(50)->create();





    }
}
