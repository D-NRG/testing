<?php

namespace Database\Seeders;

use App\Models\Manufacture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ManufactureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Manufacture::create(['manufacture'=>'Sony']);
        Manufacture::create(['manufacture'=>'Huawei']);
        Manufacture::create(['manufacture'=>'Xiaomi']);
        Manufacture::create(['manufacture'=>'Apple']);
    }
}
