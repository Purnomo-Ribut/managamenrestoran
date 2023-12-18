<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_users')->insert([
            [
                'name' => 'Aexander Martin',
                'email' => 'manager@gmail.com',
                'password' => bcrypt('manager'),
                'role' => 'manager',
                'alamat' => 'Jl Surabaya',
                'kota' => 'Surabaya',
                'gender' => 'Laki - Laki',
            ],
            [
                'name' => 'kasir',
                'email' => 'kasir@gmail.com',
                'password' => bcrypt('kasir'),
                'role' => 'kasir',
                'alamat' => 'Jl Surabaya',
                'kota' => 'Surabaya',
                'gender' => 'Laki - Laki',
            ],
            [
                'name' => 'chef',
                'email' => 'chef@gmail.com',
                'password' => bcrypt('chef'),
                'role' => 'chef',
                'alamat' => 'Jl Surabaya',
                'kota' => 'Surabaya',
                'gender' => 'Laki - Laki',
            ],
            [
                'name' => 'Juna',
                'email' => 'juna@gmail.com',
                'password' => bcrypt('juna'),
                'role' => 'chef',
                'alamat' => 'Jl Surabaya',
                'kota' => 'Surabaya',
                'gender' => 'Laki - Laki',
            ],
            [
                'name' => 'Saha',
                'email' => 'saha@gmail.com',
                'password' => bcrypt('saha'),
                'role' => 'chef',
                'alamat' => 'Jl Surabaya',
                'kota' => 'Surabaya',
                'gender' => 'Laki - Laki',
            ]
        ]);
    }
}
