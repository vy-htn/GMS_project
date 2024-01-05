<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('SERVICE_TYPE')->insert([
            ['name' => 'Khoang động cơ'],
            ['name' => 'Nội thất'],
            ['name' => 'Ngoại thất'], 
            ['name' => 'Bảo dưỡng'],
            ['name' => 'Gầm máy'],
            ['name' => 'Lốp xe'],
            ['name' => 'Vệ sinh xe'],
        ]);
    }
}
