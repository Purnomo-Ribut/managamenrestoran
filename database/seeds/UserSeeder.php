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
            ],

            // [
            //     'name' => 'kasir',
            //     'email' => 'kasir@gmail.com',
            //     'password' => bcrypt('kasir'),
            //     'role' => 'kasir',
            // ],

//             [
//                 'name' => 'Purnomo',
//                 'email' => 'kasir@gmail.com',
//                 'password' => bcrypt('kasir'),
//                 'role' => 'kasir',
//             ],

            // [
            //     'name' => 'chef',
            //     'email' => 'chef@gmail.com',
            //     'password' => bcrypt('chef'),
            //     'role' => 'chef',
            // ]
            [
                'name' => 'Juna',
                'email' => 'juna@gmail.com',
                'password' => bcrypt('juna'),
                'role' => 'chef',
            ],
            [
                'name' => 'Saha',
                'email' => 'saha@gmail.com',
                'password' => bcrypt('saha'),
                'role' => 'chef',
            ]
        ]);
    }
}
