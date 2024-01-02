<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('position')->insert([
            ['position_name' => 'Kỹ thuật  viên sơn', 'department_id' => 1],
            ['position_name' => 'Kỹ thuật  viên lốp xe', 'department_id' => 1],
            ['position_name' => 'Kỹ thuật  viên nội thất', 'department_id' => 1],
            ['position_name' => 'Kỹ thuật  viên khoang động cơ', 'department_id' => 1],
            ['position_name' => 'Quản lý nhân sự', 'department_id' => 5],
            ['position_name' => 'Trưởng phòng nhân sự', 'department_id' => 5],

        ]);
    }
}
