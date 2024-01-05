<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccessaryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('accessary_type')->insert([
            ['name' => 'Lốp'],
            ['name' => 'Bơi Làm Mát'],
            ['name' => 'Dầu Động Cơ'], 
            ['name' => 'Lọc Nhớt'],
            ['name' => 'Bộ Lọc Khí'],
            ['name' => 'Bộ Lọc Nhiên Liệu '],
            ['name' => 'Bơi Phanh'],
            ['name' => 'Bộ Lọc Khí Nội Thất'],
            ['name' => 'Bóng Đèn và Bóng Đèn Pha'],
            ['name' => 'Dây Đai '],
            ['name' => 'Hệ Thống Lọc Khí'],
            ['name' => 'Dây Điện và Bộ Nguồn '],
            ['name' => 'Thiết Bị Điện Tử và Cảm Biến'],
            ['name' => 'Phụ Tùng Khác'],
        ]);
    }
}
