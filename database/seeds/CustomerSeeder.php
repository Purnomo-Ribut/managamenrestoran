<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_customers')->insert([
            [
                'name' => 'lutfi',
                'no_table' => '21',
            ]
        ]);
    }
}
