<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('department')->insert([
            ['name' => 'Kỹ thuật'],
            ['name' => 'Dịch vụ khách hàng'],
            ['name' => 'Tiếp tân'], 
            ['name' => 'Kho hàng và vật tư'],
            ['name' => 'Nhân sự'],
        ]);
    }
}
