<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_kategoris extends Model
{
    protected $table = 'tbl_kategoris';

    protected $fillable = [
        'nama',
        'deskripsi'
    ];
}
