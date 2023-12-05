<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_kategoris')->insert([
            [
                'nama' => 'makanan',
                'deskripsi' => 'test',
            ],
            [
                'nama' => 'minuman',
                'deskripsi' => 'test',
            ]
        ]);
    }
}
