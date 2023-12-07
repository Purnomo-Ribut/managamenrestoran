<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_orders')->insert([
            [
                'customer_id' => 1,
                'user_id' => 1,
                'menu_id' => 1,
                'qty' => 2,
                'price' => 600000
            ],
            [
                'customer_id' => 1,
                'user_id' => 1,
                'menu_id' => 2,
                'qty' => 2,
                'price' => 400000
            ],
            [
                'customer_id' => 1,
                'user_id' => 1,
                'menu_id' => 3,
                'qty' => 1,
                'price' => 15000
            ],
        ]);
    }
}
