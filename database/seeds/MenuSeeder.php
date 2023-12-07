<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_menuses')->insert([
            [
                'id_kategori' => 1,
                'nama' => 'Pizza',
                'harga' => 30000,
                'stock' => 20,
                'image' => null,
                'deskripsi' => 'test',
            ],
            [
                'id_kategori' => 1,
                'nama' => 'CHEESY BEEF SPAGHETTI',
                'harga' => 20000,
                'stock' => 20,
                'image' => null,
                'deskripsi' => 'test',
            ],
            [
                'id_kategori' => 2,
                'nama' => 'Americano',
                'harga' => 15000,
                'stock' => 20,
                'image' => null,
                'deskripsi' => 'test',
            ],
        ]);
    }
}
