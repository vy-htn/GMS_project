<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run(): void
    {
        DB::table("employee")->insert([
            ['first_name' => 'Võ', 'last_name' => 'Minh Vũ', 'gender' => 'Nam', 'birthdate' => '2003-11-04', 'department_id' => '1', 'position_id' => '1', 'email' => 'vuvo1142003@gmail.com', 'phone_number' => '0936542253', 'address' => '23 Lê Thánh Tông, Ba Đình, Hà Nội'],
            ['first_name' => 'Lê', 'last_name' => 'Trọng Thành', 'gender' => 'Nam', 'birthdate' => '2003-11-04', 'department_id' => '1', 'position_id' => '3', 'email' => 'batthanh213@gmail.com', 'phone_number' => '02696 542 9801', 'address' => '23 Lê Thánh Tông, Ba Đình, Hà Nội'],
            ['first_name' => 'Phí', 'last_name' => 'Kiều Giang', 'gender' => 'Nữ', 'birthdate' => '2003-05-19', 'department_id' => '5', 'position_id' => '5', 'email' => 'phikieugiang983@naver.com', 'phone_number' => '0342344454', 'address' => '59 Tran Duy Hung, Cau Giay, Hanoi'],
            ['first_name' => 'Hi', 'last_name' => 'Thanh Ngân', 'gender' => 'Nữ', 'birthdate' => '1998-10-08', 'department_id' => '5', 'position_id' => '6', 'email' => 'hithanhngan920@yahoo.com', 'phone_number' => '098 897 3146', 'address' => 'Phường Duyệt Trung, Thành phố Cao Bằng, Cao Bằng'],
            ['first_name' => 'Thiều', 'last_name' => 'Ðăng An', 'gender' => 'Nam', 'birthdate' => '1981-02-03', 'department_id' => '1', 'position_id' => '2', 'email' => 'thieuangan379@facebook.com', 'phone_number' => '089 281 7359', 'address' => 'Xã Sơn Kỳ, Huyện Sơn Hà, Quảng Ngãi'],
            ['first_name' => 'Thục', 'last_name' => 'Hồng Xuân', 'gender' => 'Nữ', 'birthdate' => '1952-05-02', 'department_id' => '5', 'position_id' => '5', 'email' => 'thuchongxuan600@google.com', 'phone_number' => '097 215 8790', 'address' => 'Xã Hồng Tiến, Huyện Kiến Xương, Thái Bình'],
            ['first_name' => 'Võ', 'last_name' => 'Minh Vũ', 'gender' => 'Nam', 'birthdate' => '2003-11-04', 'department_id' => '1', 'position_id' => '1', 'email' => 'vuvo1142003@gmail.com', 'phone_number' => '0936542253', 'address' => '23 Lê Thánh Tông, Ba Đình, Hà Nội'],
            ['first_name' => 'Võ', 'last_name' => 'Minh Vũ', 'gender' => 'Nam', 'birthdate' => '2003-11-04', 'department_id' => '1', 'position_id' => '1', 'email' => 'vuvo1142003@gmail.com', 'phone_number' => '0936542253', 'address' => '23 Lê Thánh Tông, Ba Đình, Hà Nội'],
            ['first_name' => 'Võ', 'last_name' => 'Minh Vũ', 'gender' => 'Nam', 'birthdate' => '2003-11-04', 'department_id' => '1', 'position_id' => '1', 'email' => 'vuvo1142003@gmail.com', 'phone_number' => '0936542253', 'address' => '23 Lê Thánh Tông, Ba Đình, Hà Nội'],
            ['first_name' => 'Võ', 'last_name' => 'Minh Vũ', 'gender' => 'Nam', 'birthdate' => '2003-11-04', 'department_id' => '1', 'position_id' => '1', 'email' => 'vuvo1142003@gmail.com', 'phone_number' => '0936542253', 'address' => '23 Lê Thánh Tông, Ba Đình, Hà Nội'],
            ['first_name' => 'Võ', 'last_name' => 'Minh Vũ', 'gender' => 'Nam', 'birthdate' => '2003-11-04', 'department_id' => '1', 'position_id' => '1', 'email' => 'vuvo1142003@gmail.com', 'phone_number' => '0936542253', 'address' => '23 Lê Thánh Tông, Ba Đình, Hà Nội'],
            ['first_name' => 'Võ', 'last_name' => 'Minh Vũ', 'gender' => 'Nam', 'birthdate' => '2003-11-04', 'department_id' => '1', 'position_id' => '1', 'email' => 'vuvo1142003@gmail.com', 'phone_number' => '0936542253', 'address' => '23 Lê Thánh Tông, Ba Đình, Hà Nội'],
            ['first_name' => 'Võ', 'last_name' => 'Minh Vũ', 'gender' => 'Nam', 'birthdate' => '2003-11-04', 'department_id' => '1', 'position_id' => '1', 'email' => 'vuvo1142003@gmail.com', 'phone_number' => '0936542253', 'address' => '23 Lê Thánh Tông, Ba Đình, Hà Nội'],
        ]);
    }
}
