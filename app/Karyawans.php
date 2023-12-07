<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawans extends Model
{
    protected $table = 'tbl_karyawans';

    protected $fillable = [
        'nama',
        'alamat',
        'kota',
        'gender',
        'divisi'
    ];
}
