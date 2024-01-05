<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            ['name' => 'Admin', 'email' => 'admin@gmail.com', 'password' => '$2y$12$OXi4q1zXdr7jwEEo86KXVuw5NPz2s7NQHpM28wGl8DdpdkUZmaibC', 'is_admin' => true],
            ['name' => 'User', 'email' => 'user@gmail.com', 'password' => '$2y$12$OXi4q1zXdr7jwEEo86KXVuw5NPz2s7NQHpM28wGl8DdpdkUZmaibC','is_admin' => false],
        ]);
    }
}
