<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('supplier')->insert([
            ['name' => 'Supplier USA', 'phone' => '093788234', 'email' => 'supplie@gmail.com', 'address' => '234 Nguyes dfsd f'],
            ['name' => 'The Best Supp', 'phone' => '093788234', 'email' => 'supplie@gmail.com', 'address' => '234 Nguyes dfsd f'],
            ['name' => 'Yesterday Supplier', 'phone' => '093788234', 'email' => 'supplie@gmail.com', 'address' => '234 Nguyes dfsd f'], 
            ['name' => 'Quangchi Yesh', 'phone' => '093788234', 'email' => 'supplie@gmail.com', 'address' => '234 Nguyes dfsd f'],
            ['name' => 'The Rich Company', 'phone' => '093788234', 'email' => 'supplie@gmail.com', 'address' => '234 Nguyes dfsd f'],
        ]);
    }
}
