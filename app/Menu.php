<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'tbl_menuses';

    protected $fillable = [
        'id_kategori',
        'nama',
        'harga',
        'stock',
        'image',
        'deskripsi'
    ];

    public function tbl_kategoris() {
        return $this->belongsTo('App\Kategori', 'id_kategori');
    }
}
