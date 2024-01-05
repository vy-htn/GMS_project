<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('car')->insert([
            ['plateCode' => '51T-33242' ,'model' => 'Tesla MXA1', 'brand' => 'Tesla', 'color' => 'Blue', 'production_year' => '2022', 'status' => '1', 'customer_id' => '1', 'status' => 'absadf' ],
            ['plateCode' => '52T-43245' ,'model' => 'Audi SD2', 'brand' => 'Audi', 'color' => 'Dark', 'production_year' => '2022', 'status' => '2', 'customer_id' => '1', 'status' => 'absadf' ],
            ['plateCode' => '58A3-3331' ,'model' => 'Audi GMC', 'brand' => 'Audi', 'color' => 'Grey', 'production_year' => '2022', 'status' => '3', 'customer_id' => '1', 'status' => 'absadf' ],
            ['plateCode' => '76AH-99599' ,'model' => 'Audi SDF', 'brand' => 'Audi', 'color' => 'White', 'production_year' => '2022', 'status' => '1', 'customer_id' => '1', 'status' => 'absadf' ],
            ['plateCode' => '66B1-28344' ,'model' => 'Tesla D33ERE', 'brand' => 'Tesla', 'color' => 'Dark', 'production_year' => '2022', 'status' => '5', 'customer_id' => '1', 'status' => 'absadf' ],
            ['plateCode' => '51T4-42422' ,'model' => 'Audi DFFA', 'brand' => 'Audi', 'color' => 'Green', 'production_year' => '2022', 'status' => '3', 'customer_id' => '1', 'status' => 'absadf' ],
            ['plateCode' => '513-35533' ,'model' => 'Audi BRFD', 'brand' => 'Audi', 'color' => 'Grey', 'production_year' => '2022', 'status' => '2', 'customer_id' => '1', 'status' => 'absadf' ],
        ]);
    }
}
