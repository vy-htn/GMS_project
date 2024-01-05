<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            ['name' => 'Vo Minh Vu', 'plateNo' => 'T23-238429', 'phone' => '094478923842', 'email' => 'abcdf123@gmail.com' ],
            ['name' => 'Vo Minh Vu', 'plateNo' => '23-238429', 'phone' => '094478923842', 'email' => 'abcdf123@gmail.com' ],
            ['name' => 'Vo Minh Vu', 'plateNo' => '23-238429', 'phone' => '094478923842', 'email' => 'abcdf123@gmail.com' ],
            ['name' => 'Vo Minh Vu', 'plateNo' => '23-238429', 'phone' => '094478923842', 'email' => 'abcdf123@gmail.com' ],
            ['name' => 'Vo Minh Vu', 'plateNo' => 'T23-238429', 'phone' => '094478923842', 'email' => 'abcdf123@gmail.com' ],
            ['name' => 'Vo Minh Vu', 'plateNo' => '23-238429', 'phone' => '094478923842', 'email' => 'abcdf123@gmail.com' ],
            ['name' => 'Vo Minh Vu', 'plateNo' => '23-238429', 'phone' => '094478923842', 'email' => 'abcdf123@gmail.com' ],
        ]);
    }
}
