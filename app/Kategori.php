<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'tbl_kategoris';

    protected $fillable = [
        'nama',
        'deskripsi'
    ];
}
