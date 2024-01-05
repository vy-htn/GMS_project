<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccessarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('accessary')->insert([
            ['name' => 'Lốp xe Tesla M2', 'price' => 10000, 'quantity' => 2, 'supplier_id' => 1, 'type_id' => 1],
            ['name' => 'Bơi làm mát Toyota HSQ', 'price' => 10000, 'quantity' => 6, 'supplier_id' => 1, 'type_id' => 2 ],
            ['name' => 'Dầu động cơ M12 ', 'price' => 10000, 'quantity' => 8, 'supplier_id' => 2, 'type_id' => 3], 
            ['name' => 'Lọc Nhớt AHEWW', 'price' => 10000, 'quantity' => 12, 'supplier_id' => 2, 'type_id' => 4],
            ['name' => 'Bộ Lọc Khí Audi A8', 'price' => 20000, 'quantity' => 2, 'supplier_id' => 1, 'type_id' => 5],
        ]);
    }
}