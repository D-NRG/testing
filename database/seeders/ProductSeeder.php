<?php

namespace Database\Seeders;

use App\Models\Attr;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Product::create([
//           'name'=>'Samsung 10s','attr_value'=>Attr::get()->random()->product_cat_id
           'name'=>'Samsung 10s'
       ]);
        Product::create([
//            'name'=>'Samsung 9s','attr_value'=>Attr::get()->random()->product_cat_id
            'name'=>'Samsung 9s'
        ]);
        Product::create([
//            'name'=>'Samsung 8s','attr_value'=>Attr::get()->random()->product_cat_id
            'name'=>'Samsung 8s'
        ]);
    }
}
