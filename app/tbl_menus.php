<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_menus extends Model
{
    protected $table = 'tbl_menuses';

    protected $fillable = [
        'id_kategori',
        'nama',
        'harga',
        'stock',
        'deskripsi'
    ];

    public function tbl_kategoris() {
        return $this->belongsTo('App/tbl_kategoris', 'id_kategori');
    }
}
