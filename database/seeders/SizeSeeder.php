<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Size::create(['size'=>'5"']);
        Size::create(['size'=>'6"']);
        Size::create(['size'=>'4"']);
        Size::create(['size'=>'4.5"']);
    }
}
